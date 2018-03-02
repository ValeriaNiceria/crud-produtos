<?php

session_start();

//Endereço do site
define("BASE", "http://localhost/crud-produtos-pdo");

define("TITULO", "Painel Administrativo");

/* Conexão com o banco de dados */
define("DB_SERVIDOR", "localhost");
define("DB_USUARIO", "root");
define("DB_SENHA", "54321");
define("DB_BANCO", "crud_produtos");


/* Autoload de classe */
function __autoload($Classe) {
	require __DIR__ . '/crud/' . $Classe . '.class.php';
}

/* Filtrar post */
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

/* Efetuar login*/
if (isset($_SESSION['login'])) :
	$login['email'] = $_SESSION['login']['email'];
	$login['senha'] = $_SESSION['login']['senha'];
endif;