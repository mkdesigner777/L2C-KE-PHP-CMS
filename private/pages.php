<?php
require_once dirname(__FILE__)."/../framework/loggedin.php";
require dirname(__FILE__)."/../framework/helpers.php";
	if (!empty($_POST))
	{
		if (!empty($_POST['action']))
		{
			switch ($_POST['action'])
			{
				case 'insert' :
					if (!empty($_POST['title'] && $_POST['content'] && $_POST['User_ID'] && $_POST['menu_label'] && $_POST['menu_order']))
					{
					// db_query() > INSERT INTO
					db_query("INSERT INTO `pages` (`title`, `content`, `User_ID`, `menu_label`, `menu_order`) 
										VALUES ('".($_POST['title'])."','".($_POST['content'])."','".($_POST['User_ID'])."',
										'".($_POST['menu_label'])."','".($_POST['menu_order'])."')");
			}
					break;
				case 'update' :
					if (!empty($_POST['id']))
					{
						if (!empty($_POST['title'] && $_POST['content'] && $_POST['User_ID'] && $_POST['menu_label'] && $_POST['menu_order']))
						{
							// db_query() > UPDATE User SET ...
							db_query("UPDATE `pages` SET 'title' = '".($_POST(['title'])."','content' = '".($_POST['content'])."', 
							'User_ID' = '".($_POST['User_ID'])."', 'menu_label' = '".($_POST['menu_label'])."', 
							'menu_order' = '".($_POST['menu_order'])."' 
							WHERE ID = '".($_POST['ID'])."'"));
						}
					}
					break;
				case 'delete' :
					if (!empty($_POST['ID']))
					{
						// db_query() > DELETE FROM Users ...
						db_query("DELETE FROM `pages` WHERE ID = '".($_POST['ID'])."'");
					}
						break;
			}
		}
	}
	$pages = db_select("SELECT * FROM pages");
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Dashboard Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 main">
			<h1 class="page-header">Pages</h1>

	<!-- ERROR  !!! -->

		<a href="page.phpid=<?php echo $page->id ?>">Add New Page</a>

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Content</th>
						<th>User_ID</th>
						<th>menu_label</th>
						<th>menu_order</th>
					</tr>
					</thead>
					<tbody>

			<?php foreach ($pages as $page){ ?>

			<tr>
				<th><?php echo $page->ID ?></th>
				<th><?php echo $page->title ?></th>
				<th><?php echo $page->content ?></th>
				<th><?php echo $page->User_ID ?></th>
				<th><?php echo $page->menu_label ?></th>
				<th><?php echo $page->menu_order ?></th>
			</tr>

			<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>