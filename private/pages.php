<?php
require_once dirname(__FILE__)."/../framework/loggedin.php";
require dirname(__FILE__)."/../framework/helpers.php";
if(!empty($_POST)){
	if(!empty($_POST['action'])){
		switch($_POST['action']){
			case 'insert':
				if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['user_id']) && !empty($_POST['menu_label']) && !empty($_POST['menu_order']) ){
					// db_query() > INSERT INTO
					$db_query =sprintf("INSERT INTO `pages` (`title`, `content`, `User_ID`, `menu_label`, `menu_order`) VALUES ('%s','%s',%d,'%s',%d)",
						$_POST['title'],
						$_POST['content'],
						$_POST['user_id'],
						$_POST['menu_label'],
						$_POST['menu_order']
					);
					db_query($db_query);
				}

				break;
			case 'update':
				if(!empty($_POST['id'])){
					if(!empty($_POST['title'] && !empty($_POST['content']) && !empty($_POST['user_id']) && $_POST['menu_label'] && $_POST['menu_order'] )){
						// db_query() > UPDATE Users SET ...
						$db_query = sprintf("UPDATE `pages` SET `title`= '%s', `content`= '%s', `User_ID`= '%s', `menu_label`= '%s', `menu_order`= '%s'  WHERE ID= %d",
							$_POST['title'],
							$_POST['content'],
							$_POST['user_id'],
							$_POST['menu_label'],
							$_POST['menu_order'],
							$_POST['id']
						);
						db_query($db_query);
					}
				}
				break;
			case 'delete':
				if(!empty($_POST['id'])){
					// db_query() > DELETE FROM Users ...
					db_query(
						sprintf("DELETE FROM pages WHERE ID=%d",
							$_POST['id']
						)
					);
				}
				break;
		}
		header('Location: pages.php');
	}
}
$pages = db_select("SELECT * FROM pages");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Dashboard Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php require_once dirname(__FILE__)."/parts/header.php"; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 main">
			<h1 class="page-header">Pages</h1>

		</div>
	</div>
</div>

			<!-- ERROR !!!!  -->

			<a href="page.php">Add New Page</a>

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
						<th>AUTHOR</th>
						<th>ACTIONS</th>
					</tr>
					</thead>
					<tbody>

					<?php foreach($pages as $page){ ?>

						<tr>
							<td> <?php echo $page->ID; ?> </td>
							<td> <?php echo $page->title; ?> </td>
							<td> <?php echo $page->content; ?> </td>
							<td> <?php echo $page->User_ID; ?> </td>
							<td> <?php echo $page->menu_label; ?> </td>
							<td> <?php echo $page->menu_order; ?> </td>

							<?php
							$user_result = db_query("SELECT * FROM users WHERE id=".$page->User_ID);
							$user = mysqli_fetch_object($user_result);
							?>
						
							<td><a href=\"user.php?ID=<?php echo  $user->ID ?>\"><?php echo  $user->nickname ?></a> </td>
							<td><a href=”page.php?id=<?php echo $page->ID ?>”>Update</a> </td>
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