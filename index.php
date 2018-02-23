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

		//delete message prompt
		$action = isset($_GET['action']) ? $_GET['action'] : '';

		//if it was redirected from delete.php
		if ($action == 'deleted') {
			echo "<div class='alert alert-success'> Registro foi excluído. </div>";
		}

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

			//data from database will be here
			echo "<table class='table table-hover table-responsive'>";

				//table heading
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Nome</th>";
					echo "<th>Descrição</th>";
					echo "<th>Preço</th>";
					echo "<th>Opções</th>";
				echo "</tr>";

				//table body
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					//extract row
					//this will make $row['firstname'] to
					//just $firstname only
					extract($row);

					//creating new table row per record
					echo "<tr>";
						echo "<td>{$id}</td>";
						echo "<td>{$nome}</td>";
						echo "<td>{$descricao}</td>";
						echo "<td>R&#36; {$preco}</td>";
						echo "<td>";
							//read one record
							echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'> Ver </a>";

							//edit one record
							echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'> Editar </a>";

							//delete one record
							echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'> Excluir </a>";
						echo "</td>";
					echo "</tr>";
				}

			//end table
			echo "</table>";

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