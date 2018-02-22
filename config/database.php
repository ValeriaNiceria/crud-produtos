<?php

// used to connect to the database
$host = "127.0.0.1";
$db_name = "crud_produtos";
$username = "root";
$password = "54321";

try {
	$conexao = new PDO("mysql:dbname=" . $db_name . ";host=" . $host, $username, $password);
	
	$conexao->exec("SET NAMES 'utf8'");
} 
//show errors
catch (PDOException $exception) {
	echo "Connection error: " . $exception->getMessage();
}

?>



