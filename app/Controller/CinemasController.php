<?php

App::uses('AppController', 'Controller');

/**
 * Cinemas Controller
 *
 * @property Cinema $Cinema
 * @property PaginatorComponent $Paginator
 */
class CinemasController extends AppController {

    public $layout = 'default';
    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Paginator');
    //public $layout = 'basic';
    
    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        if (in_array($this->action, array('edit', 'delete'))) {
            $cinemaId = (int) $this->request->params['pass'][0];
            if ($this->Cinema->isOwnedBy($cinemaId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Cinema->recursive = 1;
        $this->set('cinemas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Cinema->recursive = 2;
        if (!$this->Cinema->exists($id)) {
            throw new NotFoundException(__('Invalid cinema'));
        }
        $options = array('conditions' => array('Cinema.' . $this->Cinema->primaryKey => $id));
        $this->set('cinema', $this->Cinema->find('first', $options));
    }
    
    public function simulation(){
        $cinemaSocieties = $this->Cinema->getCinemaSocieties('G');
        $this->set(compact('cinemaSocieties'));
        $this->set('_serialize', 'cinemaSocieties');
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
       
        if ($this->request->is('post')) {
            $this->Cinema->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Cinema->save($this->request->data)) {
                $this->Session->setFlash(__('The cinema has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cinema could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Cinema->User->find('list');
        $showings = $this->Cinema->Showing->find('list');
        $this->set(compact('users', 'showings'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Cinema->id = $id;
        if (!$this->Cinema->exists($id)) {
            throw new NotFoundException(__('Invalid cinema'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if ($this->Cinema->save($this->request->data)) {
                $this->Session->setFlash(__('The cinema has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cinema could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Cinema.' . $this->Cinema->primaryKey => $id));
            $this->request->data = $this->Cinema->find('first', $options);
        }
        $users = $this->Cinema->User->find('list');
        $showings = $this->Cinema->Showing->find('list');
        $this->set(compact('users', 'showings'));
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
        $this->Cinema->id = $id;
        if (!$this->Cinema->exists()) {
            throw new NotFoundException(__('Invalid cinema'));
        }
        if ($this->Cinema->delete()) {
            $this->Session->setFlash(__('Cinema deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cinema was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
        public function about() {
            $this->layout = 'default';
	}

}
