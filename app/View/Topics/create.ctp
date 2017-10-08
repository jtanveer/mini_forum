<h3><?php echo __('Create New Topic'); ?></h3>
<hr>
<div class="row mt-4">
	<div class="col-md-8">
        <?php
			echo $this->Form->create('Topic', array(
				'id' => 'formTopic',
				'url' => array('controller' => 'topics', 'action' => 'create'),
				'enctype' 	=> 'multipart/form-data',
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
					'legend' => false,
					'title',
					'content' => array(
						'label' => 'Content',
						'placeholder' => 'Text here...',
						'type' => 'textarea',
						'required' => false
					),
					'category_id'
				));
				echo $this->Form->submit('Create', array(
					'div' => 'form-group',
					'class' => 'btn btn-success'
				));
			?>
		</fieldset>
		<?php
			echo $this->Form->end();
        ?>
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
			toolbar: 'formatselect | bold italic underline backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
			menubar: false,
			setup: function(editor) {
				editor.on('keyup', function(e) {
					// Revalidate the textReply field
					$('#formTopic').formValidation('revalidateField', 'data[Topic][content]');
				});
			}
		});

		$('#formTopic').formValidation({
			framework: 'bootstrap',
			excluded: [':disabled'],
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				'data[Topic][content]': {
					validators: {
						callback: {
							message: 'Seriously, you call it a description?',
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
