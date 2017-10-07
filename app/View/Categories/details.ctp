<h3><?php echo $category['Category']['name']; ?></h3>
<small><?php echo $category['Category']['description']; ?></small>
<hr>
<div class="row mt-4">
	<div class="col-md-8">
		<?php if (count($topics)): ?>
			<h6 class="list-group-item">All Topics from <?php echo $category['Category']['name']; ?></h6>
			<ul class="list-group mb-3">
				<?php foreach ($topics as $topic): ?>
					<li class="list-group-item list-group-item-action">
						<div>
							<strong>
								<?php echo $this->Html->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'details', $topic['Topic']['id'])); ?>
							</strong>
						</div>
						<div class="content-text mt-2" data-content="<?php echo $topic['Topic']['content']; ?>">
							<?php 
								echo $this->Text->truncate(
									$topic['Topic']['content'],
									200,
									array(
										'ellipsis' => '...',
										'exact' => false,
										'html' => true
									)
								);
							?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php echo $this->Pager->pager($this->Paginator->params(), "/categories/details/{$category['Category']['id']}"); ?>
		<?php else: ?>
			<h6 class="list-group-item">No Topic from <?php echo $category['Category']['name']; ?></h6>
		<?php endif; ?>
	</div>
	<div class="col-md-4 pl-3">
		<div class="col-md-12 border">
			<h5 class="mx-3 mt-3"><?php echo __('Other Categories'); ?></h5>
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