<div class="topics view">
<h2><?php echo __('Topic'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Topic'), array('action' => 'edit', $topic['Topic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Topic'), array('action' => 'delete', $topic['Topic']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $topic['Topic']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('controller' => 'replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('controller' => 'replies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Replies'); ?></h3>
	<?php if (!empty($topic['Reply'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Topic Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($topic['Reply'] as $reply): ?>
		<tr>
			<td><?php echo $reply['id']; ?></td>
			<td><?php echo $reply['text']; ?></td>
			<td><?php echo $reply['topic_id']; ?></td>
			<td><?php echo $reply['user_id']; ?></td>
			<td><?php echo $reply['created']; ?></td>
			<td><?php echo $reply['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'replies', 'action' => 'view', $reply['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'replies', 'action' => 'edit', $reply['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'replies', 'action' => 'delete', $reply['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reply['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reply'), array('controller' => 'replies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
