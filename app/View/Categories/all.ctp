<h3><?php echo __('Categories'); ?></h3>
<div class="row mt-4">
	<div class="col-md-8">
		<table class="table table-responsive table-hover">
			<thead>
				<tr class="row">
					<th class="col-md-8">Category</th>
					<th class="col-md-4">Topics</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $category): ?>
					<tr class="row">
						<td class="col-md-8">
							<div>
								<strong>
									<?php echo $this->Html->link($category['Category']['name'], array('controller' => 'categories', 'action' => 'details', $category['Category']['id'])); ?>
								</strong>
							</div>
							<div class="content-text mt-2">
								<?php echo $category['Category']['description']; ?>
							</div>
						</td>
						<td class="col-md-4">
							<?php echo count($category['Topic']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
			<?php echo $this->Pager->pager($this->Paginator->params(), "/categories/all"); ?>
	</div>
	<div class="col-md-4 pl-3">
		<div class="col-md-12 border">
			<h5 class="mx-3 mt-3"><?php echo __('Recent Topics'); ?></h5>
			<div class="list-group">
				<?php foreach ($recents as $topic): ?>
					<a class="list-group-item list-group-item-action border-0" href="/topics/details/<?php echo $topic['Topic']['id']; ?>">
						<?php echo $topic['Topic']['title']; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>