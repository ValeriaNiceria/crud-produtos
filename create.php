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
				//new 'image' field
				$imagem = !empty($_FILES['imagem']["name"]) ? sha1_file($_FILES['imagem']['tmp_name']) . "-" . basename($FILES['imagem']['name']) : "" ;
				$imagem = htmlspecialchars(strip_tags($imagem));

				// insert query
				$query = ("INSERT INTO produtos (nome, descricao, preco, criado, imagem) VALUES (:NOME, :DESCRICAO, :PRECO, :CRIADO, :IMAGEM)");

				// prepare query for execution
				$stmt = $conexao->prepare($query);

				// bind the parameters
				$stmt->bindParam(':NOME', $nome);
		        $stmt->bindParam(':DESCRICAO', $descricao);
		        $stmt->bindParam(':PRECO', $preco);
		        $stmt->bindParam(':CRIADO', $criado);
		        $stmt->bindParam(":IMAGEM", $imagem);
		 		
		 		// Execute the query
		        if ($stmt->execute()) {
		        	//now, if image is not empty, try to upload the image
		        	if ($imagem) {
		        		//sha1_file() function is used to make a unique file name
		        		$target_directory = "uploads/";
		        		$target_file = $target_directory . $imagem;
		        		$file_type = pathinfo($target_file, PATHINFO_EXTENSION);

		        		//error message is empty
		        		$file_upload_error_messages = "";

		        		//make sure that file is a real image
		        		$check = getimagesize($_FILES['imagem']['tmp_name']);
		        		if ($check !== false) {
		        			//submitted file is an image
		        		} else {
		        			$file_upload_error_messages.="<div> O arquivo enviado não é uma imagem. </div>";
		        		}
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