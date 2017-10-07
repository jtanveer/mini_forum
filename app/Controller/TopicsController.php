<?php
App::uses('AppController', 'Controller');
/**
 * Topics Controller
 *
 * @property Topic $Topic
 * @property PaginatorComponent $Paginator
 */
class TopicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $uses = array('Topic', 'Category', 'Reply');

	public function beforeFilter() {
	    parent::beforeFilter();

	    $this->Auth->allow('all', 'details');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->Paginator->paginate('Topic'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Topic->create();
			if ($this->Topic->save($this->request->data)) {
				$this->Flash->success(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The topic could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Topic->Category->find('list');
		$users = $this->Topic->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Topic->save($this->request->data)) {
				$this->Flash->success(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The topic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
			$this->request->data = $this->Topic->find('first', $options);
		}
		$categories = $this->Topic->Category->find('list');
		$users = $this->Topic->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Topic->delete()) {
			$this->Flash->success(__('The topic has been deleted.'));
		} else {
			$this->Flash->error(__('The topic could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function all() {
		$this->Topic->recursive = 1;
		$this->Paginator->settings = array(
			'order' => array('Topic.created' => 'desc')
		);
		$topics = $this->Paginator->paginate('Topic');
		$this->Category->recursive = 0;
		$categories = $this->Category->find('all');
		$this->set(compact('topics', 'categories'));
	}

	public function details($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->Topic->unbindModel(array('hasMany' => array('Reply')));
		$topic = $this->Topic->find('first', $options);
		$replies = $this->Reply->find('all', array(
			'conditions' => array('Reply.topic_id' => $id)
		));
		$recents = $this->Topic->find('all', array(
			'conditions' => array('Topic.id <>' => $id),
			'order' => array('Topic.created' => 'desc'),
			'limit' => 5
		));
		$this->set(compact('topic', 'replies', 'recents'));
	}

	public function create() {
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$this->request->data['Topic']['user_id'] = $user['id'];
			$this->Topic->create();
			if ($this->Topic->save($this->request->data)) {
				$this->Flash->success(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The topic could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Topic->Category->find('list');
		$this->set(compact('categories'));
	}

	public function ajax_reply($id = null) {

	} 
}
