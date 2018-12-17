<?php

function db_connect()
{
	require dirname(__FILE__)."/../config/database.php";
	return mysqli_connect($database['host'], $database['user'], $database['pass'], $database['name'], $database['port']);
}


/**
 * @param $sql_string
 *
 * @return bool|mysqli_result
 */
function db_query($sql_string)
{
	return mysqli_query(db_connect(), $sql_string);
}

function db_select($query)
{
	$result = [];
	$db_result = db_query($query);
	while(($data = mysqli_fetch_object($db_result)) != false){
		array_push($result, $data);
	}
	return $result;
}