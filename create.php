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

		<!-- Código PHP -->

		<!-- Formulário -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form">
			<label form="name">Nome</label>
			<input type="text" name="name" id="name" class="form-control"/>

			<label for="description">Descrição</label>
			<textarea name="description" id ="descripation" class="form-control"></textarea>

			<label for="price">Preço</label>
			<input type="text" name="price" id="price" class="form-control"/>

			<div class="pull-right margin-top-1">
				<input type="submit" value="Salvar" class="btn btn-primary"/>
				<a href="index.php" class="btn btn-danger button-top">Voltar para lista de produtos</a>
			</div>
		</form>

	</div>


<!--jQuery-->
<script src="js/jquery-3.2.1.min.js"></script>
<!--JavaScript-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>