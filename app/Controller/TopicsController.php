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

	public $paginate = array(
		'recursive' => 1,
		'order' => array(
			'Topic.created' => 'desc'
		)
	);

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
		$title_for_layout = 'Mini Forum: A forum of life!';
		// get all topics
		$this->Paginator->settings = $this->paginate;
		$topics = $this->Paginator->paginate('Topic');
		// get all categories
		$categories = $this->Category->getAll();
		$this->set(compact('title_for_layout', 'topics', 'categories'));
	}

	public function details($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		// get topic details
		$topic = $this->Topic->getTopicDetails($id);
		// get topic replies
		$replies = $this->Reply->getRepliesById($id);
		// get recent topics
		$recents = $this->Topic->getRecentTopics($id);
		$title_for_layout = $topic['Topic']['title'].' | Mini Forum';
		$this->set(compact('title_for_layout', 'topic', 'replies', 'recents'));
	}

	public function create() {
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$this->request->data['Topic']['user_id'] = $user['id'];
			$this->Topic->create();
			if ($this->Topic->save($this->request->data)) {
				$this->Flash->success(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'all'));
			} else {
				$this->Flash->error(__('The topic could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Topic->Category->find('list');
		$recents = $this->Topic->find('all', array(
			'order' => array('Topic.created' => 'desc'),
			'limit' => 5
		));
		$title_for_layout = "Create New Topic".' | Mini Forum';
		$this->set(compact('title_for_layout', 'categories', 'recents'));
	}

	public function reply($id = null) {
		$this->autoRender = false;
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$this->request->data['Reply']['user_id'] = $user['id'];
			$this->request->data['Reply']['topic_id'] = $id;
			$this->Reply->create();
			if ($this->Reply->save($this->request->data)) {
				$this->Flash->success(__('The reply has been sent.'));
				return $this->redirect(array('action' => 'details', $id));
			} else {
				$this->Flash->error(__('The reply could not be sent. Please, try again.'));
				return $this->redirect(array('action' => 'details', $id));
			}
		}
	} 
}
