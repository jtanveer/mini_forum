<?php
App::uses('AppHelper', 'View/Helper');

class AccessHelper extends AppHelper {
	var $helpers = array("Session");
	var $Access;
	var $Auth;
	var $user;
	
	function beforeRender($viewFile) {
		parent::beforeRender($viewFile);

		App::import('Component', 'Access');
		$this->Access = new AccessComponent(new ComponentCollection());
		
		App::import('Component', 'Auth');
		$this->Auth = new AuthComponent(new ComponentCollection());
		$this->Auth->Session = $this->Session;
		
		$this->user = $this->Auth->user();
	}
	
	function check($aco, $action='*') {
		if(empty($this->user)) return false;
		return $this->Access->checkHelper(array('model' => 'Group', 'foreign_key' => $this->user['Group']['id']), $aco, $action);
	}
	
	function isLoggedin() {
		return !empty($this->user);
	}

	function getUser() {
		return $this->user;
	}
}