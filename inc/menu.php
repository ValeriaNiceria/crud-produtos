<nav class="navbar navbar-expand-lg navbar-light bg-light row"> 
  <a class="navbar-brand" href="<?= BASE ?>">
    <img src="assets/img/home.png">
    Painel Administrativo
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE ?>/?pag=produtos">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE ?>/?pag=usuarios">Usuários</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASE ?>/?pag=cadastro_produto">Produto</a>
          <a class="dropdown-item" href="<?= BASE ?>/?pag=cadastro_usuario">Usuário</a>
        </div>
      </li>
    </ul>

    <form method="post" class="form-inline">
        <button name="efetuar_logoff" class="btn btn-outline-danger">Sair</button>
    </form>
  
  </div>
</nav>