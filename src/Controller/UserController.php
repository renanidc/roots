<?php

class UserController extends Controller{
	public function __construct(){
		$this->view = new UserView();
	}

	public function indexAction(){
		return;
	}

	public function loginAction(){
		$viewModel = array();
		$this->setRoute($this->view->getLoginRoute());
		$this->showView($viewModel);
	}

	public function addAction(){	
		$message = Message::singleton();
		
		$viewModel = array();
		
		if(array_key_exists ('save', $_REQUEST))
		{
			$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
			$password =  array_key_exists ('password', $_REQUEST) ? $_REQUEST['password'] : '';
			
			$confirm_password =  array_key_exists ('confirm_password', $_REQUEST) ? $_REQUEST['confirm_password'] : '';
		  
		  	try
			{
				if(empty($email))
					throw new Exception('Preencha o campo Email!');

				if(empty($password))
					throw new Exception('Preencha o campo Senha!');

				if(empty($confirm_password))
					throw new Exception('Preencha o confirmar Senha!');

				if($password!=$confirm_password)
					throw new Exception('As senhas não conferem!');
			
				$user = new User();
				$user->setEmail($email);
				$user->setPassword(md5($password));
				
				$userDao = new UserDao();

				if ($userDao->validate( $email )) {
					
					$this->setRoute($this->view->getAddRoute());
				
					throw new Exception('Usuário com o e-mail [' . $email . '] já está cadastrado no sistema');
				}	
			
				if($userDao->insert($user))
					$message->addMessage('Usuário adicionado com sucesso!');
					$this->setRoute($this->view->getAddRoute());
			}
			catch(Exception $e)
			{
				$this->setRoute($this->view->getAddRoute()); 
				
				$message->addWarning($e->getMessage());
			}
		}
		else
			$this->setRoute($this->view->getAddRoute()); 
		
		$this->showView($viewModel);

		return;
	}
	
	public function editAction(){

		$message = Message::singleton();
		
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';
		
		if(array_key_exists ('save', $_REQUEST))
		{
			$name =  array_key_exists ('name', $_REQUEST) ? $_REQUEST['name'] : '';
			
			$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
			$active =  array_key_exists ('active', $_REQUEST) ? 1 : 0;
			
			try
			{
				if(empty($name))
					throw new Exception('Preencha o campo Nome!');

				if(empty($email))
					throw new Exception('Preencha o campo Email!');
			
				$user = new User();
				$user->setId($id);
				$user->setName($name);
				$user->setEmail($email);
				$user->setActive($active);
				
				$userDao = new UserDao();	
			
				if($userDao->update($user))
					$message->addMessage('Usuário adicionado com sucesso!');

				$viewModel = array(
					'users' => $userDao->getAll(),
				);
				
				$this->setRoute($this->view->getListRoute());		
			}
			catch(Exception $e)
			{
				$message->addWarning($e->getMessage());
			}
		}
		else
		{
			$userDao = new UserDao();
			
			$viewModel = array(
				'user' => $userDao->getUser($id),
			);
			
			$this->setRoute($this->view->getEditRoute());
		}

		$this->showView($viewModel);

		return;
	}
	
	public function listAction(){

		$userDao = new UserDao();	
	
		$this->setRoute($this->view->getListRoute());
		
		$viewModel = array(
			'users' => $userDao->getAll(),
		);
		
		$message = Message::singleton();
		
		$message->addMessage('Lista de usuários carregada com sucesso!');
		
		$this->showView($viewModel);
		
		return;
	}

	public function passAction(){

		$message = Message::singleton();
		
		$viewModel = array();
		
		$userDao = new UserDao();
		
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';		
		
		if(array_key_exists ('save', $_REQUEST))
		{			
			//Capturar parametros
			$senhaAtual =  array_key_exists ('senhaAtual', $_REQUEST) ? $_REQUEST['senhaAtual'] : '';		  
			$novasenha =  array_key_exists ('novasenha', $_REQUEST) ? $_REQUEST['novasenha'] : '';		  
			$confirmarsenha =  array_key_exists ('confirmarsenha', $_REQUEST) ? $_REQUEST['confirmarsenha'] : '';
		  
		  	try
			{
				if(empty($senhaAtual))
					throw new Exception('Preencha o campo senha Atual!');

				if(empty($novasenha))
					throw new Exception('Preencha o campo nova Senha!');					
					
				if(empty($confirmarsenha))
					throw new Exception('Preencha o campo confirmar senha!');
			
				if ($novasenha != $confirmarsenha)
					throw new Exception('As senhas não conferem!');
			
				$user = $userDao->getUser($id);
				
				//Verificar senha atual
				if ($userDao->authenticate($user->getEmail(), md5($senhaAtual)) == NULL )
					throw new Exception('Senha atual incorreta!');
			
				//Setar nova senha
				$user->setPassword(md5($novasenha) );
			
				if($userDao->updatePassword( $user ))
					$message->addMessage('Senha alterada com sucesso!');				
				
				$viewModel = array(
					'users' => $userDao->getAll(),
				);
				
				$this->setRoute($this->view->getListRoute());
			}
			catch(Exception $e)
			{
				$viewModel = array(
					'user' => $userDao->getUser($id),
				);
			
				$this->setRoute($this->view->getPassRoute());
				
				$message->addWarning($e->getMessage());
			}
		}
		else
		{
			$viewModel = array(
				'user' => $userDao->getUser($id),
			);
			
			$this->setRoute($this->view->getPassRoute());
		}
		
		$this->showView($viewModel);

		return;
	}

	public function deleteAction(){					
		
		$message = Message::singleton();
		
		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';
		
		if(array_key_exists ('delete', $_REQUEST))
		{
			$name =  array_key_exists ('name', $_REQUEST) ? $_REQUEST['name'] : '';
			
			$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';			
			
			try
			{
				$user = new User();
				$user->setId($id);
				$user->setName($name);
				$user->setEmail($email);
				
				$userDao = new UserDao();	
			
				if($userDao->delete($user))
					$message->addMessage('Usuário removido com sucesso!');

				$viewModel = array(
					'users' => $userDao->getAll(),
				);
				
				$this->setRoute($this->view->getListRoute());		
			}
			catch(Exception $e)
			{
				$message->addWarning($e->getMessage());
			}
		}
		else
		{
			$userDao = new UserDao();
			
			$viewModel = array(
				'user' => $userDao->getUser($id),
			);
			
			$this->setRoute($this->view->getDeleteRoute());
		}

		$this->showView($viewModel);

		return;
		}	
	}