<div class="replies view">
<h2><?php echo __('Reply'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reply['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $reply['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reply['User']['username'], array('controller' => 'users', 'action' => 'view', $reply['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($reply['Reply']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reply'), array('action' => 'edit', $reply['Reply']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reply'), array('action' => 'delete', $reply['Reply']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reply['Reply']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
