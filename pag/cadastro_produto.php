 <?php require_once('exe/exe_cad_produto.php');
 echo isset($erro) ? "<div class='alert alert-danger'>" . $erro . "</div>" : "";
 ?>
 <div class="container mt-4" role="document">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header bg-primary">
            <h5 class="modal-title"><img src="assets/img/product.png" class="mx-2">Cadastro de produtos</h5>
        </div>
        <div class="modal-body">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required/>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" required></textarea>

            <label for="preco">Preço:</label>
            <div class="input-group">
                <div class="input-group-preped">
                    <div class="input-group-text">R$</div>
                </div>
                <input type="text" name="preco" id="preco" class="form-control" required/>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="cad_produto" class="btn btn-primary botao mt-2">
                <img src="assets/img/save.png" class="mx-2">
                Salvar
            </button>
        </div>
    </form>
    </div>
  </div>

