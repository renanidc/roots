<?php

class AdminAuthenticateController extends Controller
{
	public function __construct()
	{
		$this->view = new AdminView();
	}
	public function indexAction()
	{
		return;
	}
	public function loginAction()
	{

		$adminDao = new AdminDao();
		
		$message = Message::singleton();
		
		$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
		$senha =  array_key_exists ('senha', $_REQUEST) ? $_REQUEST['senha'] : '';
			
		if(($admin = $adminDao->authenticate($email, md5($senha))))
		{	
			$_SESSION['ADMIN'] = serialize($admin); 
			
			$this->setRoute($this->view->getAccessRoute());
			
			//$message->addMessage('Administrador autenticado com sucesso!');
		}
		else
		{
			$message->addWarning('Administrador ou senha incorretos!');
		
			$this->setRoute($this->view->getLoginRoute());
		}
		
		$this->showView();
		
		return;
	}
	public function logoffAction()
	{
		if(isset($_SESSION['ADMIN']))
			unset ($_SESSION['ADMIN']);
		
		$this->setRoute($this->view->getLoginRoute());
		
		$this->showView();
		
		return;
	}
}