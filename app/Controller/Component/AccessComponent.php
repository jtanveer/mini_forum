<?php
App::uses('Component', 'Controller');

class AccessComponent extends Component {
	var $components = array('Acl', 'Auth');
	var $user;
	
	function startup(Controller $controller) {
		parent::startup($controller);

		$this->user = $this->Auth->user();
	}
	
	function check($aco, $action='*') {
		if(!empty($this->user) && $this->Acl->check(array('model' => 'Group', 'foreign_key' => $this->user['Group']['id']), $aco, $action)){
			return true;
		} else {
			return false;
		}
	}
	
	function checkHelper($aro, $aco, $action = "*") {
		return $this->Acl->check($aro, $aco, $action);
	}
}