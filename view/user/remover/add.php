<div class="page-header">
        <h1>Cadastro de Usuários</h1>
</div>
<form class="form-horizontal" action="index.php?controller=User&action=add" method="post">

    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Nome</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="name" placeholder="Nome" name="name">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="password" placeholder="Senha" name="password">
      </div>
    </div>
    <div class="form-group">
      <label for="active" class="col-lg-2 control-label">Ativo</label>
      <div class="col-lg-10">
        <input type="checkbox" name="active">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-default" name="save">Salvar</button>
      </div>
    </div>
</form>