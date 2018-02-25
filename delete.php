<?php

//include database connection
require_once("config/database.php");

try {

	//get record ID
	$id = isset($_GET['id']) ? $_GET['id'] : die('Erro: Não foi encontrado um registro com esse ID.');

	//delete query
	$query = ("DELETE FROM produtos WHERE id = :ID");
	$stmt = $conexao->prepare($query);
	$stmt->bindParam(':ID', $id);

	if ($stmt->execute()) {
		//redirect to read records page and tell the user record was deleted
		header('Location: index.php?action=deleted');
	} else {
		die('Não foi possível excluir o registro.');
	}

} catch (PDOException $exception) {
	die('Erro: ' . $exception->getMessage());
}

?>