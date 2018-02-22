<?php
// include database connection
require_once("config/database.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PDO - Create a Record</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<!-- File style CSS-->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

	<div class="container">

		<div class="page-header">
			<h1>Adicionar Produto</h1>
		</div>

		<!-- Code PHP -->
		<?php

		try {
			if ($_POST) {
				// posted values
				$nome = (isset($_POST['nome']) ? htmlspecialchars(strip_tags($_POST['nome'])) : '');
				$descricao = (isset($_POST['descricao']) ? htmlspecialchars(strip_tags($_POST['descricao'])) : '');
				$preco = (isset($_POST['preco']) ? htmlspecialchars(strip_tags($_POST['preco'])) : '');
				$criado = date('Y-m-d H:i:s');

				// insert query
				$query = ("INSERT INTO produtos (nome, descricao, preco, criado) VALUES (:NOME, :DESCRICAO, :PRECO, :CRIADO)");

				// prepare query for execution
				$stmt = $conexao->prepare($query);

				// bind the parameters
				$stmt->bindParam(':NOME', $nome);
		        $stmt->bindParam(':DESCRICAO', $descricao);
		        $stmt->bindParam(':PRECO', $preco);
		        $stmt->bindParam(':CRIADO', $criado);
		 		
		 		// Execute the query
		        if ($stmt->execute()) {
		            $msg_success = "Registro salvo com sucesso.";
		        } else {
		            $msg_erro = "Erro ao tentar salvar o registro.";
		        }
		    }
		} // show error 
		catch (PDOException $erro) {
		    $msg_erro = "Erro: " .$erro->getMessage();
		}

		?>

		<!-- Notice -->
		<?php
			echo (isset($msg_success) ? "<div class='alert alert-success'>" .$msg_success. "</div>" : '');
			echo (isset($msg_erro) ? "<div class='alert alert-danger'>" .$msg_erro. "</div>" : '');
		?>

		<!-- Form -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form">
			<label form="nome">Nome</label>
			<input type="text" name="nome" id="nome" class="form-control"/>

			<label for="descricao">Descrição</label>
			<textarea name="descricao" id ="descricao" class="form-control"></textarea>

			<label for="preco">Preço</label>
			<input type="text" name="preco" id="preco" class="form-control"/>

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