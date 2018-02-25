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


		//PAGINATION VARIABLES
		//page is the current page, if there's nothing set, default is page 1
		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		//set records or rows of data per page
		$records_per_page = 4;

		//calculate for the query LIMIT clause
		$from_record_num = ($records_per_page * $page) - $records_per_page;


		//delete message prompt
		$action = isset($_GET['action']) ? $_GET['action'] : '';

		//if it was redirected from delete.php
		if ($action == 'deleted') {
			echo "<div class='alert alert-success'> Registro foi excluído com sucesso. </div>";
		}


		// select data for current page
		$query = "SELECT id, nome, descricao, preco FROM produtos ORDER BY id DESC
		    LIMIT :FROM_RECORD_NUM, :RECORDS_PER_PAGE";
		 
		$stmt = $conexao->prepare($query);
		$stmt->bindParam(":FROM_RECORD_NUM", $from_record_num, PDO::PARAM_INT);
		$stmt->bindParam(":RECORDS_PER_PAGE", $records_per_page, PDO::PARAM_INT);
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

			// PAGINATION
			// count total number of rows
			$query = "SELECT COUNT(*) as total_rows FROM produtos";
			$stmt = $conexao->prepare($query);
			 
			// execute query
			$stmt->execute();
			 
			// get total rows
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$total_rows = $row['total_rows'];

			// paginate records
			$page_url = "index.php?";
			include_once ("paging.php");

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

<!-- JavaScript to confirm record deletion -->
<script>
//confirm record deletion
function delete_user( id ) {
	var answer = confirm('Você tem certeza?');
	if (answer) {
		//if user clicked ok
		//pass the id to delete.php and execute the delete query
		window.location = 'delete.php?id=' + id;
	}
}
</script>

</body>
</html>