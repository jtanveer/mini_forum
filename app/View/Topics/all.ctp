<div class="row">
	<h3 class="col-md-10"><?php echo __('Topics'); ?></h3>
	<div class="col-md-2">
		<?php if ($this->Access->isLoggedIn()) {
			echo $this->Html->link(__('Create Topic'), array('controller' => 'topics', 'action' => 'create'), array('class' => 'btn btn-secondary float-right'));
			}
		?>
	</div>
</div>
<div class="row mt-4">
	<div class="col-md-9">
		<table class="table table-responsive table-hover">
			<thead>
				<tr class="row">
					<th class="col-md-8">Topic</th>
					<th class="col-md-2">Cateogry</th>
					<th class="col-md-2">Replies</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($topics as $topic): ?>
					<tr class="row">
						<td class="col-md-8">
							<div>
								<strong>
									<?php echo $this->Html->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'details', $topic['Topic']['id'])); ?>
								</strong>
							</div>
							<div class="mt-2">
								<?php 
									echo $this->Text->truncate(
										$topic['Topic']['content'],
										160,
										array(
											'ellipsis' => '...',
											'exact' => false,
    										'html' => true
										)
									);
								?>
							</div>
							<small>By <?php echo $topic['User']['username']; ?> on <?php echo $this->Time->format($topic['Topic']['created'], '%B %e, %Y %H:%M %p'); ?> </small>
						</td>
						<td class="col-md-2"><?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'details', $topic['Category']['id'])); ?></td>
						<td class="col-md-2"><?php echo h(count($topic['Reply'])); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
			<?php echo $this->Pager->pager($this->Paginator->params(), "/topics/all"); ?>
	</div>
	<div class="col-md-3 pl-3">
		<div class="col-md-12 border">
			<h5 class="mx-3 mt-3"><?php echo __('Categories'); ?></h5>
			<div class="list-group">
				<?php foreach ($categories as $category): ?>
					<a class="list-group-item list-group-item-action border-0" href="/categories/details/<?php echo $category['Category']['id']; ?>">
						<?php echo $category['Category']['name']; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>