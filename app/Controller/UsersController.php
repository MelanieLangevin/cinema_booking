<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        $this->Auth->allow('logout');
    }

    public function isAuthorized($user) {

        if (in_array($this->action, array('edit', 'delete'))) {
            $userId = (int) $this->request->params['pass'][0];
            if ($this->User->isOwnedBy($userId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->recursive = 2;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $d = $this->request->data;
                $this->send_mail($d['User']['email'], $d['User']['username'], $d['User']['password']);
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function send_mail($receiver = null, $name = null, $pass = null) {
        $passwordHasher = new SimplePasswordHasher();
        $passw = $passwordHasher->hash($pass);
        $login = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
        $active = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . 'users/activate/' . $this->User->id . '-' . md5($passw);
        
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('no-reply@cinemamenic.com');
        $email->to($receiver);
        $email->subject('Mail Confirmation');
        $email->emailFormat('html');
        $email->template('signup');
        $email->viewVars(array('username' => $name, 'password' => $pass, 'isConfirmed' => $active));
        $email->send();
    }

    public function activate($token) {
        $token = explode('-', $token);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'id' => $token[0],
                'isConfirmed' => 0)
        ));
        $pass = md5($user['User']['password']);
        if (!empty($user) && $pass == $token[1]) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('isConfirmed', 1);
            $this->Session->setFlash(__('Your account has been activated successfully'), 'flash/success');
            $this->Auth->login();
        } else {
            $this->Session->setFlash(__("This activation link is invalid"), 'flash/error');
            $this->Auth->logout();
        }
    }

}
