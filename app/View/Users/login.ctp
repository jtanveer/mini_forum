<div class="container card div-center pt-3 pb-2 mt-5 mb-5">
	<?php
		echo $this->Form->create('User', array(
			'url' => 'login',
			'inputDefaults' => array(
	            'div' => 'form-group',
	            'wrapInput' => false,
	            'class' => 'form-control'
	        ),
	        'class' => 'well'
		));
	?>
	<fieldset>
		<?php
			echo $this->Form->inputs(array(
			    'legend' => __('Login'),
			    'username',
			    'password'
			));
			echo $this->Form->submit('Login', array(
                'div' => 'form-group',
                'class' => 'btn btn-success'
            ));
		?>
	</fieldset>
	<?php
		echo $this->Form->end();
	?>
</div>