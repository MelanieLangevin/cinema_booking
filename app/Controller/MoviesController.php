<?php

App::uses('AppController', 'Controller');

/**
 * Movies Controller
 *
 * @property Movie $Movie
 * @property PaginatorComponent $Paginator
 */
class MoviesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');
    public $uses = array('Movie', 'Studio');
    public $helpers = array('Js');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Movie->recursive = 0;
        $this->set('movies', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Movie->recursive = 2;
        if (!$this->Movie->exists($id)) {
            throw new NotFoundException(__('Invalid movie'));
        }
        $options = array('conditions' => array('Movie.' . $this->Movie->primaryKey => $id));
        $this->set('movie', $this->Movie->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Movie->create();
            if ($this->Movie->save($this->request->data)) {
                $this->Session->setFlash(__('The movie has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                // check if file has been uploaded, if so get the file path
                if (!empty($this->Movie->data['Movie']['poster']) && is_string($this->Movie->data['Movie']['poster'])) {
                    $this->request->data['Movie']['poster'] = $this->Movie->data['Movie']['poster'];
                }
                $this->Session->setFlash(__('The movie could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $ratings = $this->Movie->Rating->find('list');
        $categories = $this->Movie->Category->find('list');
        $this->set(compact('categories', 'ratings'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Movie->id = $id;
        if (!$this->Movie->exists($id)) {
            throw new NotFoundException(__('Invalid movie'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Movie->save($this->request->data)) {
                $this->Session->setFlash(__('The movie has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                if (!empty($this->Movie->data['Movie']['poster']) && is_string($this->Movie->data['Movie']['poster'])) {
                    $this->request->data['Movie']['poster'] = $this->Movie->data['Movie']['poster'];
                }
                $this->Session->setFlash(__('The movie could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Movie.' . $this->Movie->primaryKey => $id));
            $this->request->data = $this->Movie->find('first', $options);
        }
        $ratings = $this->Movie->Rating->find('list');
        $categories = $this->Movie->Category->find('list');
        $this->set(compact('categories', 'ratings'));
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
        $this->Movie->id = $id;
        if (!$this->Movie->exists()) {
            throw new NotFoundException(__('Invalid movie'));
        }
        if ($this->Movie->delete()) {
            $this->Session->setFlash(__('Movie deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Movie was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add' || $this->action === 'edit') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function getByRating($id = null) {
        $rating_id = $this->request->data['Showing']['rating_id'];

        $movies = $this->Movie->find('list', array(
            'conditions' => array('Movie.rating_id' => $rating_id),
            'recursive' => -1
        ));

        $this->set('movies', $movies);
        $this->layout = 'ajax';
    }

    public function handleAjax() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $studioNames = $this->Studio->getStudioNames($term);
            $this->set(compact('studioNames'));
            $this->set('_serialize', 'studioNames');
        }
    }

}
