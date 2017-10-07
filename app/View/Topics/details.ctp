<h3><?php echo $topic['Topic']['title']; ?></h3>
<small>By <?php echo $topic['User']['username']; ?> on <?php echo $this->Time->format($topic['Topic']['created'], '%B %e, %Y %H:%M %p'); ?> </small>
<hr>
<div class="row mt-4">
	<div class="col-md-8">
		<p><?php echo $topic['Topic']['content']; ?></p>
		<h6 class="list-group-item">
			<?php 
				$count = count($replies);
				echo $count . ($count > 1 ? ' Replies' : ' Reply');
			?>
		</h6>
		<ul class="list-group mb-3">
			<?php foreach ($replies as $reply): ?>
				<li class="list-group-item list-group-item-action">
					<div>
						<strong>
							<?php echo $reply['User']['username']; ?>
						</strong>
					</div>
					<div class="content-text mt-2">
						<?php echo $reply['Reply']['text']; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
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