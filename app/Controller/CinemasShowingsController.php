<?php

App::uses('AppController', 'Controller');

/**
 * CinemasShowings Controller
 *
 * @property CinemasShowing $CinemasShowing
 * @property PaginatorComponent $Paginator
 */
class CinemasShowingsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->CinemasShowing->recursive = 0;
        $this->set('cinemasShowings', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CinemasShowing->exists($id)) {
            throw new NotFoundException(__('Invalid cinemas showing'));
        }
        $options = array('conditions' => array('CinemasShowing.' . $this->CinemasShowing->primaryKey => $id));
        $this->set('cinemasShowing', $this->CinemasShowing->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CinemasShowing->create();
            if ($this->CinemasShowing->save($this->request->data)) {
                $this->Session->setFlash(__('The cinemas showing has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cinemas showing could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $cinemas = $this->CinemasShowing->Cinema->find('list');
        $showings = $this->CinemasShowing->Showing->find('list');
        $this->set(compact('cinemas', 'showings'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->CinemasShowing->id = $id;
        if (!$this->CinemasShowing->exists($id)) {
            throw new NotFoundException(__('Invalid cinemas showing'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CinemasShowing->save($this->request->data)) {
                $this->Session->setFlash(__('The cinemas showing has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cinemas showing could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('CinemasShowing.' . $this->CinemasShowing->primaryKey => $id));
            $this->request->data = $this->CinemasShowing->find('first', $options);
        }
        $cinemas = $this->CinemasShowing->Cinema->find('list');
        $showings = $this->CinemasShowing->Showing->find('list');
        $this->set(compact('cinemas', 'showings'));
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
        $this->CinemasShowing->id = $id;
        if (!$this->CinemasShowing->exists()) {
            throw new NotFoundException(__('Invalid cinemas showing'));
        }
        if ($this->CinemasShowing->delete()) {
            $this->Session->setFlash(__('Cinemas showing deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cinemas showing was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
