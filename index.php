<?php

require_once('exe/exe.php');

/* cabeçalho do site */
require_once('inc/header.inc.php');

/* verifica se o usuário está logado */
if (isset($login)) :
    require_once('pag/home.php');
else :
    require_once('pag/login.php');
endif;

/* rodapé do site */
require_once('inc/footer.inc.php');