<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PDO - Update a Record</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
	
		<div class="page-header">
			<h1>Atualizar Produto</h1>
		</div>

		<!-- Code PHP -->
		<?php
		//get passed parameter value, in this case, the record ID
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: Não foi encontrado nenhum registro com esse ID.');

		//include database connection
		require_once("config/database.php");

		//read current record's data
		try {
			//prepare selection query
			$query = ("SELECT id, nome, descricao, preco FROM produtos WHERE id = :ID LIMIT 0,1");
			$stmt = $conexao->prepare($query);

			//this is the first question mark
			$stmt->bindParam(':ID', $id);

			//execute our query
			$stmt->execute();

			//store retrieved row to a variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			//values to fill up the form
			$nome = $row['nome'];
			$descricao = $row['descricao'];
			$preco = $row['preco'];
		} 
		//show error
		catch (PDOException $exception) {
			die('Erro: ' . $exception->getMessage());
		}
		?>

		<!-- Form -->
		<!-- HTML form to update a record -->
		<form action="<?php echo htmlspecialchars($_SESSION['PHP_SELF'] . 'id={$id}'); ?>" method="POST" class="form-group">

			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome, ENT_QUOTES); ?>" class="form-control"/>

			<label for="descricao">Descrição</label>
			<textarea name="desc" id="descricao" class="form-control">
				<?php echo htmlspecialchars($descricao, ENT_QUOTES); ?>	
			</textarea>

			<label for="preco">Preço</label>
			<input type="text" name="preco" id="preco" value="<?php echo htmlspecialchars($preco, ENT_QUOTES); ?>" class="form-control"/>

			<div class="pull-right margin-top-1">
				<input type="submit" value="Salvar" class="btn btn-primary"/>
				<a href="index.php" class="btn btn-danger">Voltar para lista de produtos</a>
			</div>	
		</form>


	</div>
	
<!--jQuery-->
<script src="js/jquery-3.2.1.min.js"></script>
<!--JavaScript-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>