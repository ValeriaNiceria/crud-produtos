<?php require_once('exe/exe_lista_usuario.php'); ?>

<h1>Usuários</h1>

<?php if (empty($usuarios)) : ?>

<div class="alert alert-info">
    <p><center>Nenhum registro encontrado.</center></p>
</div>

<?php else: ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td>
                <a href="" class="btn btn-info">visualizar</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php endif; ?>