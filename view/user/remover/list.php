<div class="page-header">
        <h1>Lista de Usuários</h1>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	
	if($users)
	{
		foreach ($users as $user) :?>
			<tr>
			  <td><?php echo $user->getId() ?></td>
			  <td><a href="index.php?controller=User&action=edit&id=<?php echo $user->getId() ?>"><?php echo $user->getName() ?></a></td>
			  <td><?php echo $user->getEmail() ?></td>
			  <td>
					<a href="#">[Editar]</a>
					<a href="index.php?controller=User&action=delete&id=<?php echo $user->getId() ?>">[Excluir]</a>
					<a href="index.php?controller=User&action=pass&id=<?php echo $user->getId() ?>">[Alterar Senha]</a>
			  </td>
			</tr>
		<?php 
		endforeach; 
	}
	?>    
  </tbody>
</table>