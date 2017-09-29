<div class="topics form">
<?php echo $this->Form->create('Topic'); ?>
	<fieldset>
		<legend><?php echo __('Edit Topic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content');
		echo $this->Form->input('category_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Topic.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Topic.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('controller' => 'replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('controller' => 'replies', 'action' => 'add')); ?> </li>
	</ul>
</div>
