<?php

require_once('exe/exe.php');

/* cabeçalho do site */
require_once('inc/header.inc.php');

/* verifica se o usuário está logado */
if (isset($login)) :
    require_once('inc/menu.php');
    
    //navegação entre as páginas
    if (isset($get['pag'])) :
        require_once("pag/{$get['pag']}.php");
    endif;

    //mensagem success
    if (isset($success)) :
        echo "<p><div class='alert alert-success'>" . $success . "</div></p>";
    endif;
    //mensagem erro
    if (isset($error)) :
        echo "<p><div class='alert alert-danger'>" .$error.  "</div></p>";
    endif;
    
/* se o usuário não estiver logado redireciona para página de login*/
else :
    require_once('pag/login.php');
endif;

/* rodapé do site */
require_once('inc/footer.inc.php');