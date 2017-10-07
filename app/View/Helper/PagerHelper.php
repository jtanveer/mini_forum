<?php
App::uses('AppHelper', 'View/Helper');

class PagerHelper extends AppHelper {

	var $helpers = array('Html');


	/*
	Generates html like the following

	<nav aria-label="Page navigation">
		<ul class="pagination">
			<?php $params = $this->Paginator->params(); ?>
			<?php if($params['prevPage']): ?>
				<li class="page-item col-sm-6 text-center">
					<a class="page-link" href="/topics/all/page:<?php echo $params['page'] - 1; ?>">
						<span aria-hidden="true">&laquo; Previous</span>
					</a>
				</li>
			<?php else: ?>
				<li class="page-item disabled col-sm-6 text-center">
					<a class="page-link" href="#">
						<span aria-hidden="true">&laquo; Previous</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if($params['nextPage']): ?>
				<li class="page-item col-sm-6 text-center">
					<a class="page-link" href="/topics/all/page:<?php echo $params['page'] + 1; ?>">
						<span aria-hidden="true">Next &raquo;</span>
					</a>
				</li>
			<?php else: ?>
				<li class="page-item disabled col-sm-6 text-center">
					<a class="page-link" href="#">
						<span aria-hidden="true">Next &raquo;</span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</nav>
	*/
	function pager($params, $url) {
		$span1 = $this->Html->tag("span", "&laquo; Previous");
		$options = array();
		if ($params["prevPage"]) {
			if($params['page'] - 1 == 1) {
				$options["href"] = $url;
			} else {
				$options["href"] = $url."/page:".($params['page'] - 1);
			}
			$options["class"] = "page-link";
			$a1 = $this->Html->tag("a", $span1, $options);
			$options = array();
			$options["class"] = "page-item col-sm-6 text-center";
			$li1 = $this->Html->tag("li", $a1, $options);
		} else {
			$options["href"] = "#";
			$options["class"] = "page-link";
			$a1 = $this->Html->tag("a", $span1, $options);
			$options = array();
			$options["class"] = "page-item disabled col-sm-6 text-center";
			$li1 = $this->Html->tag("li", $a1, $options);
		}
		$span2 = $this->Html->tag("span", "Next &raquo;");
		$options = array();
		if ($params["nextPage"]) {
			$options["href"] = $url."/page:".($params['page'] + 1);
			$options["class"] = "page-link";
			$a2 = $this->Html->tag("a", $span2, $options);
			$options = array();
			$options["class"] = "page-item col-sm-6 text-center";
			$li2 = $this->Html->tag("li", $a2, $options);
		} else {
			$options["href"] = "#";
			$options["class"] = "page-link";
			$a2 = $this->Html->tag("a", $span2, $options);
			$options = array();
			$options["class"] = "page-item disabled col-sm-6 text-center";
			$li2 = $this->Html->tag("li", $a2, $options);
		}

		$options = array();
		$options["class"] = "pagination";
		$ul = $this->Html->tag("ul", $li1.$li2, $options);

		return $this->Html->tag("nav", $ul); 
	}
}