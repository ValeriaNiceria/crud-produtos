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
				$imagem = $_FILES['imagem'];

				if ($imagem["error"]) {
			       throw new Exception ("Error: " . $file["error"]);
			    }

				$dirUploads = "uploads";

				if (!is_dir($dirUploads)) { 
			        mkdir($dirUploads) or die ("Não foi possível criar a pasta!");
			    }

				// insert query
				$query = ("INSERT INTO produtos (nome, descricao, preco, criado, imagem) VALUES (:NOME, :DESCRICAO, :PRECO, :CRIADO, :IMAGEM)");

				// prepare query for execution
				$stmt = $conexao->prepare($query);

				// bind the parameters
				$stmt->bindParam(':NOME', $nome);
		        $stmt->bindParam(':DESCRICAO', $descricao);
		        $stmt->bindParam(':PRECO', $preco);
		        $stmt->bindParam(':CRIADO', $criado);
		        $stmt->bindParam(":IMAGEM", $imagem['name']);
		 		
		 		// Execute the query
		        if ($stmt->execute()) {
		        	if (move_uploaded_file($imagem['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $imagem['name'])) {
		        		echo "<div class='alert alert-success'>Upload realizado com sucesso!</div>";
		        	} else {
		        		throw new Exception("Não foi possível realizar o upload");
		        		
		        	}
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
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="form">
			<label form="nome">Nome</label>
			<input type="text" name="nome" id="nome" class="form-control"/>

			<label for="descricao">Descrição</label>
			<textarea name="descricao" id ="descricao" class="form-control"></textarea>

			<label for="preco">Preço</label>
			<input type="text" name="preco" id="preco" class="form-control"/>

			<label for="imagem">Foto</label>
			<input type="file" name="imagem" id="imagem"/>

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