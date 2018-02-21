<?php

// used to connect to the database
$host = "127.0.0.1";
$db_name = "crud_produtos";
$username = "root";
$password = "54321";

try {
	$con = new PDO("mysql:host={$host};db_name={$db_name}", $username, $password);
} 
//show errors
catch (PDOException $exception) {
	echo "Connection error: " . $exception->getMessage();
}

?>