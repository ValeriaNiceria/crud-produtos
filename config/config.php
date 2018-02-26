<?php

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