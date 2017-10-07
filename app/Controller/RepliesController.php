<?php
App::uses('AppController', 'Controller');
/**
 * Replies Controller
 *
 * @property Reply $Reply
 * @property PaginatorComponent $Paginator
 */
class RepliesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $uses = array('Reply', 'Topic');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reply->recursive = 0;
		$this->set('replies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reply->exists($id)) {
			throw new NotFoundException(__('Invalid reply'));
		}
		$options = array('conditions' => array('Reply.' . $this->Reply->primaryKey => $id));
		$this->set('reply', $this->Reply->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reply->create();
			if ($this->Reply->save($this->request->data)) {
				$this->Flash->success(__('The reply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reply could not be saved. Please, try again.'));
			}
		}
		$topics = $this->Topic->find('list');
		$users = $this->Reply->User->find('list');
		$this->set(compact('topics', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reply->exists($id)) {
			throw new NotFoundException(__('Invalid reply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reply->save($this->request->data)) {
				$this->Flash->success(__('The reply has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reply could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reply.' . $this->Reply->primaryKey => $id));
			$this->request->data = $this->Reply->find('first', $options);
		}
		$topics = $this->Topic->find('list');
		$users = $this->Reply->User->find('list');
		$this->set(compact('topics', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reply->id = $id;
		if (!$this->Reply->exists()) {
			throw new NotFoundException(__('Invalid reply'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reply->delete()) {
			$this->Flash->success(__('The reply has been deleted.'));
		} else {
			$this->Flash->error(__('The reply could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
