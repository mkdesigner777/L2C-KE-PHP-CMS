<?php

require dirname(__FILE__). "/../framework/helpers.php";

$data = db_query("SELECT * FROM users");

foreach ($data as $i => $hodnota){

	var_dump($hodnota);
	echo "<br>";
}

