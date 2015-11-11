<?php

App::uses('AppController', 'Controller');

/**
 * Showings Controller
 *
 * @property Showing $Showing
 * @property PaginatorComponent $Paginator
 */
class ShowingsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $helpers = array('Js');
    public $components = array('Paginator');
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Showing->recursive = 1;
        $this->set('showings', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Showing->recursive = 2;
        if (!$this->Showing->exists($id)) {
            throw new NotFoundException(__('Invalid showing'));
        }
        $options = array('conditions' => array('Showing.' . $this->Showing->primaryKey => $id));
        $this->set('showing', $this->Showing->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Showing->create();
            if ($this->Showing->save($this->request->data)) {
                $this->Session->setFlash(__('The showing has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The showing could not be saved. Please, try again.'), 'flash/error');
            }
        }
        //$this->loadModel("Rating");
        $ratings = $this->Showing->Movie->Rating->find('list');
        $movies = $this->Showing->Movie->find('list');
        $cinemas = $this->Showing->Cinema->find('list');
        $schedules = $this->Showing->Schedule->find('list');
        $this->set(compact('cinemas', 'schedules','movies', 'ratings'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Showing->id = $id;
        if (!$this->Showing->exists($id)) {
            throw new NotFoundException(__('Invalid showing'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Showing->save($this->request->data)) {
                $this->Session->setFlash(__('The showing has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The showing could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Showing.' . $this->Showing->primaryKey => $id));
            $this->request->data = $this->Showing->find('first', $options);
        }
        //$this->loadModel("Movie");
        $ratings = $this->Showing->Movie->Rating->find('list');
        $movies = $this->Showing->Movie->find('list');
        $cinemas = $this->Showing->Cinema->find('list');
        $schedules = $this->Showing->Schedule->find('list');
        $this->set(compact('cinemas', 'schedules','movies', 'ratings'));
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
        $this->Showing->id = $id;
        if (!$this->Showing->exists()) {
            throw new NotFoundException(__('Invalid showing'));
        }
        if ($this->Showing->delete()) {
            $this->Session->setFlash(__('Showing deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Showing was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add' || $this->action === 'edit') {
            return true;
        }

        return parent::isAuthorized($user);
    }

}
