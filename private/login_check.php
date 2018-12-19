<?php
require_once dirname(__FILE__)."/../framework/helpers.php";

if(!empty($_POST)){
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		// tu mame data ktore zadal pouzivatel
		$users = db_select( sprintf("SELECT * FROM Users WHERE email = '%s'", $_POST['email']));


		if(!empty($users)){

			$user = $users[0];

			if($user->password === $_POST['password']){
				// email aj heslo suhlasia
				session_start();
				$_SESSION['email'] = $user->email;
				$_SESSION['id'] = $user->id;
				header("Location: index.php");

			} else {
				echo "nesuhlasi heslo";

			}
		} else {
			echo "nesuhlasi pouzivatel";
		}

	} else {

	}
} else {

}