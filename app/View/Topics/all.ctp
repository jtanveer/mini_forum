<h3><?php echo __('Topics'); ?></h3>
<div class="row mt-4">
	<div class="col-sm-9">
		<table class="table table-responsive table-hover">
			<thead>
				<tr class="row">
					<th class="col-sm-2">Title</th>
					<th class="col-sm-4">Content</th>
					<th class="col-sm-2">Cateogry</th>
					<th class="col-sm-2">Author</th>
					<th class="col-sm-2">Replies</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($topics as $topic): ?>
					<tr class="row clickable-row" data-href="/topics/details/<?php echo $topic['Topic']['id']; ?>">
						<td class="col-sm-2 content-title" data-title="<?php echo $topic['Topic']['title']; ?>"></td>
						<td class="col-sm-4 content-text" data-content="<?php echo h($topic['Topic']['content']); ?>"></td>
						<td class="col-sm-2"><?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'details', $topic['Category']['id'])); ?></td>
						<td class="col-sm-2"><?php echo h($topic['User']['username']); ?></td>
						<td class="col-sm-2"><?php echo h(count($topic['Reply'])); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
	</div>
	<div class="col-sm-3 bg-secondary p-3">
		
	</div>
</div>
<script type="text/javascript">
	function shorten(text, maxLength, delimiter, overflow) {
		delimiter = delimiter || "…";
		overflow = overflow || false;
		var ret = text;
		if (ret.length > maxLength) {
			var breakpoint = overflow ? maxLength + ret.substr(maxLength).indexOf(" ") : ret.substr(0, maxLength).lastIndexOf(" ");
			ret = ret.substr(0, breakpoint) + delimiter;
		}
		return ret;
	}

	$(document).ready(function() {
		$("td.content-title").each(function(i,v){
			var str = $(v).data("title");
			$(v).text(shorten(str, 20));
		});
		$("td.content-text").each(function(i,v){
			var str = $(v).data("content");
			$(v).text(shorten(str, 60));
		});
	});
</script>
<div class="topics index">
	<h2><?php echo __('Topics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($topics as $topic): ?>
	<tr>
		<td><?php echo h($topic['Topic']['id']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['title']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['content']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
		</td>
		<td><?php echo h($topic['Topic']['created']); ?>&nbsp;</td>
		<td><?php echo h($topic['Topic']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $topic['Topic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topic['Topic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topic['Topic']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $topic['Topic']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><? if($this->Access->isLoggedin() && $this->Access->check('Topics/add')){ echo $this->Html->link(__('New Topic'), array('action' => 'add'));} ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replies'), array('controller' => 'replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reply'), array('controller' => 'replies', 'action' => 'add')); ?> </li>
	</ul>
</div>
