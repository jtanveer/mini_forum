<h3><?php echo __('Topics'); ?></h3>
<div class="row mt-4">
	<div class="col-sm-9">
		<table class="table table-responsive table-hover">
			<thead>
				<tr class="row">
					<th class="col-sm-6">Topic</th>
					<th class="col-sm-2">Cateogry</th>
					<th class="col-sm-2">Author</th>
					<th class="col-sm-2">Replies</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($topics as $topic): ?>
					<tr class="row">
						<td class="col-sm-6">
							<div>
								<strong>
									<?php echo $this->Html->link($topic['Topic']['title'], array('controller' => 'topics', 'action' => 'details', $topic['Topic']['id'])); ?>
								</strong>
							</div>
							<div class="content-text mt-2" data-content="<?php echo $topic['Topic']['content']; ?>">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
								</div>
							</div>
						</td>
						<td class="col-sm-2"><?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'details', $topic['Category']['id'])); ?></td>
						<td class="col-sm-2"><?php echo h($topic['User']['username']); ?></td>
						<td class="col-sm-2"><?php echo h(count($topic['Reply'])); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
			<?php echo $this->Pager->pager($this->Paginator->params(), "/topics/all"); ?>
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
		$("div.content-text").each(function(i,v){
			var str = $(v).data("content");
			$(v).text(shorten(str, 160));
		});
	});
</script>