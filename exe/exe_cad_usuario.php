<?php

if (isset($post['cad_usuario'])) :

$nome = isset($post['nome']) ? $post['nome'] : NULL;
$email = isset($post['email']) ? $post['email'] : NULL;
$senha = isset($post['senha']) ? $post['senha'] : NULL;

$dados = "'{$nome}', '{$email}', '{$senha}'";
$campos = "nome, email, senha";
$tabela = "usuarios";

$Criar = new Criar;
$Criar->query($tabela, $campos, $dados);
$resultado = $Criar->getResultados();

if ($resultado == 0) {
    $error = "Não foi possível realizar o cadastro.";
} else {
    //header('Location:' . BASE . '/?pag=usuarios');
    $success = "Cadastro realizado com sucesso!";
}

endif;