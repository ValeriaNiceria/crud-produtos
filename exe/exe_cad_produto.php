<?php 

if (isset($post['cad_produto'])) :
    
$nome = isset($post['nome']) ? $post['nome'] : NULL;
$descricao = isset($post['descricao']) ? $post['descricao'] : NULL;
$preco = isset($post['preco']) ? $post['preco'] : NULL;
$criado = date('Y-m-d H:i:s');

$dados = "'{$nome}', '{$descricao}', '{$preco}','{$criado}'";
$campos = "nome, descricao, preco, criado";
$tabela = "produtos";

$Criar = new Criar;
$Criar->query($tabela, $campos, $dados);
$resultado = $Criar->getResultados();

if ($resultado == 0) {
    $error = "Erro ao inserir um novo produto";
} else {
    $success = "Produto cadastrado com sucesso!";
}

endif;