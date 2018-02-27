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

			$Ler = new Ler;

			$Ler->query("produtos");

			echo "<pre>";
				var_dump($Ler->getResultados());
			echo "</pre>";

			//Retorna o nome do produto da posição '0' do array
			var_dump($Ler->getResultados()[0]["nome"]);

			//Pegando diversos dados do array
			$produto = $Ler->getResultados()[0];
			extract($produto);
			echo "<hr/>";
			echo ("O produto {$nome} tem o valor de R$ {$preco}");
			
		?>

	</div>



<!--jQuery-->
<script src="assets/js/jquery-3.2.1.min.js"></script>	
<!--JavaScript-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/all.js"></script>
</body>
</html>