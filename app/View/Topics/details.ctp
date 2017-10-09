<h3><?php echo $topic['Topic']['title']; ?></h3>
<small>By <?php echo $topic['User']['username']; ?> on <?php echo $this->Time->format($topic['Topic']['created'], '%B %e, %Y %H:%M %p'); ?> | <?php echo $this->Html->link(__($topic['Category']['name']), array('controller' => 'categories', 'action' => 'details', $topic['Category']['id'])); ?></small>
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
					<div class="mt-2">
						<?php echo $reply['Reply']['text']; ?>
					</div>
					<div class="mt-2">
						<p class="mini-text"><?php echo $this->Time->format($reply['Reply']['created'], '%B %e, %Y %H:%M %p'); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php if ($this->Access->isLoggedIn()): ?>
			<div>
				<?php
					echo $this->Form->create('Reply', array(
						'id' => 'formReply',
						'url' => array('controller' => 'topics', 'action' => 'reply', $topic['Topic']['id']),
						'enctype' 	=> 'multipart/form-data',
						'inputDefaults' => array(
							'div' => 'form-group',
							'wrapInput' => false,
							'class' => 'form-control'
						),
						'class' => 'well'
					));
					echo $this->Form->input('text', array(
						'label' => 'Add your reply',
						'placeholder' => 'Reply here...',
						'type' => 'textarea',
						'required' => false
					));
					echo $this->Form->submit('Reply', array(
						'div' => 'form-group',
						'class' => 'btn btn-success'
					));
					echo $this->Form->end();
				?>
			</div>
    	<?php endif; ?>
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
<script>
	$(document).ready(function() {
		tinymce.init({
			selector:'textarea',
			toolbar: 'bold italic',
			menubar: false,
			setup: function(editor) {
				editor.on('keyup', function(e) {
					// Revalidate the textReply field
					$('#formReply').formValidation('revalidateField', 'data[Reply][text]');
				});
			}
		});

		$('#formReply').formValidation({
			framework: 'bootstrap',
			excluded: [':disabled'],
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				'data[Reply][text]': {
					validators: {
						callback: {
							message: 'Reply should be a bit bigger than this!',
							callback: function(value, validator, $field) {
								// Get the plain text without HTML
								var text = tinyMCE.activeEditor.getContent({
									format: 'text'
								});

								return text.length >= 2;
							}
						}
					}
				}
			}
		});
	});
</script>