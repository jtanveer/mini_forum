<?php
echo $this->Form->create('User', array('url' => 'register'));
echo $this->Form->inputs(array(
    'legend' => __('Register'),
    'username',
    'email',
    'password',
    'password_again' => array(
    	'div' => array(
    		'class' => 'input password required'
    	),
    	'type' => 'password',
    	'required' => true
    )
));
echo $this->Form->end('Register');
?>