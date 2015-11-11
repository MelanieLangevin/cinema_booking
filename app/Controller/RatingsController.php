<?php

App::uses('AppController', 'Controller');

/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RatingsController extends AppController {

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
        $this->Rating->recursive = 0;
        $this->set('ratings', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Rating->recursive = 2;
        if (!$this->Rating->exists($id)) {
            throw new NotFoundException(__('Invalid rating'));
        }
        $options = array('conditions' => array('Rating.' . $this->Rating->primaryKey => $id));
        $this->set('rating', $this->Rating->find('first', $options));
    }

}
