<?php

App::uses('AppController', 'Controller');

/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class SchedulesController extends AppController {

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
        $this->Schedule->recursive = 0;
        $this->set('schedules', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Schedule->recursive = 2;
        if (!$this->Schedule->exists($id)) {
            throw new NotFoundException(__('Invalid schedule'));
        }
        $options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
        $this->set('schedule', $this->Schedule->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Schedule->create();
            if ($this->Schedule->save($this->request->data)) {
                $this->Session->setFlash(__('The schedule has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The schedule could not be saved. Please, try again.'), 'flash/error');
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
        $this->Schedule->id = $id;
        if (!$this->Schedule->exists($id)) {
            throw new NotFoundException(__('Invalid schedule'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Schedule->save($this->request->data)) {
                $this->Session->setFlash(__('The schedule has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The schedule could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
            $this->request->data = $this->Schedule->find('first', $options);
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
        $this->Schedule->id = $id;
        if (!$this->Schedule->exists()) {
            throw new NotFoundException(__('Invalid schedule'));
        }
        if ($this->Schedule->delete()) {
            $this->Session->setFlash(__('Schedule deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Schedule was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function getByDate() {
        $day = date("N", $this->request->data['Showing']['date']);
        debug($day);
        if ($day >= 5) {
            $schedules = $this->Schedule->find('list');
        } else {
            $schedules = $this->Schedule->find('list', array(
                'conditions' => array('Schedule.holiday' => false),
                'recursive' => -1
            ));
        }

        $this->set('schedules', $schedules);
        $this->layout = 'ajax';
    }

}
