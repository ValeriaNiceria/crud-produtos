<?php require_once('exe/exe_lista_produto.php'); ?>
<h1>Produtos</h1>

<!-- verifica se o array está vazio -->
<?php if (!empty($produtos)) : ?>

<table class="table table-hover">

<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>
    <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td>
                <a href="" class="btn btn-info">Editar</a>
                <a href="" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>    
</tbody>

</table>

<?php else: ?>

<div class="alert alert-info">
    <p><center>Nenhum produto encontrado.</center></p>
</div>

<?php endif; ?>