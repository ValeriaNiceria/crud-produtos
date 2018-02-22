<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>PDO - Read One Record</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

	<div class="container">

		<div class="page-header">
			<h1>Produto</h1>
		</div>

		<!-- Code PHP -->
		<?php

		//get passed parameter value, in this case, the record ID
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: Não existe um registro com esse ID.');

		//include database connection
		require_once("config/database.php");

		//read current record's data
		try {

			//prepare select query
			$query = ("SELECT id, nome, descricao, preco FROM produtos WHERE id = :ID LIMIT 0,1");
			$stmt = $conexao->prepare($query);

			//this is the first question mark
			$stmt->bindParam(':ID', $id);

			//execute query
			$stmt->execute();

			//store retrieved row to a variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//values to fill up the form
			$nome = $row['nome'];
			$descricao = $row['descricao'];
			$preco = $row['preco'];

		}//show error
		 catch(PDOException $exception) {
		 	die ('Erro: ' . $exception->getMessage());
		}

		?>

		<!-- display record details -->
		<table class='table table-hover table-responsive'>

			<tr>
				<td><strong>Nome</strong></td>
				<td><?php echo htmlspecialchars($nome, ENT_QUOTES); ?></td>
			</tr>

			<tr>
				<td><strong>Descrição</strong></td>
				<td><?php echo htmlspecialchars($descricao, ENT_QUOTES); ?></td>
			</tr>

			<tr>
				<td><strong>Preço</strong></td>
				<td><?php echo htmlspecialchars($preco, ENT_QUOTES); ?></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<a href="index.php" class="btn btn-danger pull-right"> Voltar para lista de produtos </a>
				</td>
			</tr>

		</table>

	</div>


<!-- jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>
<!--JavaScript-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>