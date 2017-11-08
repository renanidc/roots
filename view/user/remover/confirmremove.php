<form class="form-horizontal" action="index.php?controller=User&action=delete&id=<?php echo $user->getId()?>" method="post"> 
  <div class="page-header">
          <h1>Deseja realmente excluir esse usuário?</h1>
          <p>Usuário: <?php echo $user->getName() ?> </p>
          <p>e-mail: <?php echo $user->getEmail() ?> </p>
          <button type="submit" class="btn btn-danger" name="delete">Excluir</button>          
  </div>  
</form>

<a href="index.php?controller=User&action=list"><button class="btn btn-success" name="cancelar">Cancelar</button></a>