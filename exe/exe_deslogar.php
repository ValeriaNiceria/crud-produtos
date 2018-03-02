<?php

if (isset($post['efetuar_logoff'])) :
    unset($_SESSION['login']);
    
    header('Location:' . BASE);
endif;