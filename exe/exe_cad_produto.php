<?php 

if (isset($post['cad_produto'])) :
    
$nome = $post['nome'];
$descricao = $post['descricao'];
$preco = $post['preco'];
$criado = date('Y-m-d H:i:s');

$dados = "'{$nome}', '{$descricao}', '{$preco}','{$criado}'";

$tabela = "produtos";

$campos = "nome, descricao, preco, criado";

$Criar = new Criar;

$Criar->query($tabela, $campos, $dados);

$resultado = $Criar->getResultados();

if ($resultado == 0) {
    $erro = "Erro ao inserir um novo produto";
} else {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/crud-produtos-pdo/?pag=produtos'>
        <script type=\"text/javascript\">
            alert(\"Produto cadastrado com sucesso!\");
        </script>
    ";
}

endif;