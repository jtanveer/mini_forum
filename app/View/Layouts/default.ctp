<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$siteDescription = __d('mini_forum', 'Mini Forum: A forum of life!');
$devInfo = __d('mini_forum', 'Developed by: Jamael Tanveer Nayon');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://cloud.tinymce.com/stable/plugins.min.js?apiKey=cwo1kn107a7aoeq6jwns2zyj6ipmk5149vwqsepfijt8fbk3"></script>
	<script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
	<script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>

	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('mini_forum.generic');
		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand text-warning logo-text" href="/"><b>Mini Forum</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">Topics <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="/categories/all">Categories</a>
				</li>
			</ul>
			<div class="text-white mt-2 mr-2">
				<?php echo $this->Access->isLoggedin() ? '<h6>Welcome '.$this->Access->user['username'].'!</h6>' : '<h6>Welcome!</h6>'; ?>
			</div>
			<div>
				<?php 
					if($this->Access->isLoggedin()) {
						echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-secondary'));
					} else {
						echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-secondary mr-2'));
						echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register'), array('class' => 'btn btn-secondary'));
					}
				?>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Flash->render(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<footer class="footer">
  		<div class="container-fluid">
    		<span class="text-muted"><?php echo __d('cake_dev', 'CakePHP %s', Configure::version()); ?></span>
  		</div>
    </footer>
</body>
</html>
