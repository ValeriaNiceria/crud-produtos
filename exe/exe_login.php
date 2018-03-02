<?php

if (isset($post['efetuar_login'])) :
    $_SESSION['login']['email'] = $post['email'];
    $_SESSION['login']['senha'] = $post['senha'];

    header('Location:' . BASE);
endif;