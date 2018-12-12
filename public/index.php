<?php

require dirname(__FILE__). "/../framework/helpers.php";

$pages = db_select("SELECT * FROM pages");

?>

<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Blog Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

	<div class="blog-header">
		<h1 class="blog-title">The Bootstrap Blog</h1>
		<p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
	</div>



	<div class="row">

		<div class="col-sm-8 blog-main">

			<?php foreach($pages as $page){ ?>
			<h2 class= "blog-post-title"><?php echo $page->title; ?></h2>

			<?php
				$user = db_select("SELECT * FROM users where ID=".$page->User_ID)
			?>
			<p class="blog-post-meta">December 14, 2013 by <a href="#"><?php echo $user[0]->email; ?></a></p>

			<p><?php echo $page->content; ?></p>

		</div><!-- /.blog-post -->

<?php }?>

		<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<div class="sidebar-module sidebar-module-inset">
				<h4>About</h4>
				<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
			</div>

		</div><!-- /.blog-sidebar -->


	</div><!-- /.container -->

	<footer class="blog-footer">
		<p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
		<p>
			<a href="#">Back to top</a>
		</p>
	</footer>


	<!-- Bootstrap core JavaScript
	================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

</body></html>

<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item active" href="#">Home</a>
		</nav>
	</div>
</div>





