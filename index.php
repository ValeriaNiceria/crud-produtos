<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>PDO - Read Records</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<!--Style CSS-->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

	<div class="container">

		<div class="page-header">
			<h1>Lista de Produtos</h1>
		</div>

		<!-- Code PHP -->

		<?php
		//include database connection
		require_once("config/database.php");

		//select all data
		$query = ("SELECT id, nome, descricao, preco FROM produtos ORDER BY id DESC");
		$stmt = $conexao->prepare($query);
		$stmt->execute();

		//this is how to get numbers of rows returned
		$num = $stmt->rowCount();

		//link to create record form
		echo "<a href='create.php' class='btn btn-primary m-b-1em'> Adicionar novo Produto </a>";

		//check if more that 0 record found
		if ($num > 0) {

		} 
		//if no records found
		else {
			echo "<div class='alert alert-danger'> Não foi localizado nenhum registro. </div>";
		}


		?>

	</div>


<!--jQuery-->
<script src="js/jquery-3.2.1.min.js"></script>
<!--JavaScript-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>