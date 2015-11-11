<?php
App::uses('AppController', 'Controller');
/**
 * SchedulesShowings Controller
 *
 * @property SchedulesShowing $SchedulesShowing
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class SchedulesShowingsController extends AppController {

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
		$this->SchedulesShowing->recursive = 0;
		$this->set('schedulesShowings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SchedulesShowing->exists($id)) {
			throw new NotFoundException(__('Invalid schedules showing'));
		}
		$options = array('conditions' => array('SchedulesShowing.' . $this->SchedulesShowing->primaryKey => $id));
		$this->set('schedulesShowing', $this->SchedulesShowing->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SchedulesShowing->create();
			if ($this->SchedulesShowing->save($this->request->data)) {
				$this->Session->setFlash(__('The schedules showing has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedules showing could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$schedules = $this->SchedulesShowing->Schedule->find('list');
		$showings = $this->SchedulesShowing->Showing->find('list');
		$this->set(compact('schedules', 'showings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->SchedulesShowing->id = $id;
		if (!$this->SchedulesShowing->exists($id)) {
			throw new NotFoundException(__('Invalid schedules showing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SchedulesShowing->save($this->request->data)) {
				$this->Session->setFlash(__('The schedules showing has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedules showing could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('SchedulesShowing.' . $this->SchedulesShowing->primaryKey => $id));
			$this->request->data = $this->SchedulesShowing->find('first', $options);
		}
		$schedules = $this->SchedulesShowing->Schedule->find('list');
		$showings = $this->SchedulesShowing->Showing->find('list');
		$this->set(compact('schedules', 'showings'));
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
		$this->SchedulesShowing->id = $id;
		if (!$this->SchedulesShowing->exists()) {
			throw new NotFoundException(__('Invalid schedules showing'));
		}
		if ($this->SchedulesShowing->delete()) {
			$this->Session->setFlash(__('Schedules showing deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Schedules showing was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
