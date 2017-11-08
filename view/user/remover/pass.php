
<div class="page-header">
        <h1>Alterar a Senha</h1>
</div>
<form class="form-horizontal" action="index.php?controller=User&action=pass&id=<?php echo $user->getId()?>" method="post">

    <div class="form-group">
      <label for="senhaAtual" class="col-lg-2 control-label">Senha Atual</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="senhaAtual" placeholder="Informe a Senha Atual" name="senhaAtual">
      </div>
    </div>
    <div class="form-group">
      <label for="novasenha" class="col-lg-2 control-label">Nova Senha</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="novasenha" placeholder="Informe a Nova Senha" name="novasenha">
      </div>
    </div>
    <div class="form-group">
      <label for="confirmarsenha" class="col-lg-2 control-label">Confirmar Senha</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="confirmarsenha" placeholder="Confirme a Nova Senha" name="confirmarsenha">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-default" name="save">Alterar</button>
      </div>
    </div>
</form>