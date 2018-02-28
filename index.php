<?php require_once("config/config.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= TITULO ?></title>
	<link rel="stylesheet" href="assets/css/normalize.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
	
	<div class="container-fluid">
		
		
		<?php
			require_once("pag/login.php");
			
			$Excluir = new Excluir;

			$tabela = "produtos";
			$termos = "WHERE id = 2";

			$Excluir->query($tabela, $termos);

			echo ("{$Excluir->getResultados()} Resultado(s) Excluído(s)");			
		?>

	</div>



<!--jQuery-->
<script src="assets/js/jquery-3.2.1.min.js"></script>	
<!--JavaScript-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.js"></script>
</body>
</html>