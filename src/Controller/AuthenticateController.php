<?php

class AuthenticateController extends Controller
{
	public function __construct()
	{
		$this->view = new AuthenticateView();
	}
	public function indexAction()
	{
		return;
	}
	public function loginAction()
	{
		$authenticateDao = new AuthenticateDao();
		
		$message = Message::singleton();
		
		$email =  array_key_exists ('email', $_REQUEST) ? $_REQUEST['email'] : '';
			
		$senha =  array_key_exists ('senha', $_REQUEST) ? $_REQUEST['senha'] : '';
			
		if(($user = $authenticateDao->authenticate($email, $senha)))
		{	
			$_SESSION['USER'] = serialize($user); 
			
			//$this->setRoute($this->view->getIndexRoute());
			
			//$message->addMessage('Usuário Autenticado com sucesso!');

			header("Location:index.php");
			return;
		}
		else
		{
			$message->addWarning('Usuário ou senha incorretos!');
		
			$this->setRoute($this->view->getLoginRoute());
		}
		
		$this->showView();
		
		return;
	}
	public function logoffAction()
	{
		if(isset($_SESSION['USER']))
			unset ($_SESSION['USER']);
		
		$this->setRoute($this->view->getLoginRoute());
		
		$this->showView();
		
		return;
	}
	
	public function perfilAction()
	{

		$valorTotal=0;

		if(isset($_SESSION['CART'])){

			$cartController = new CartController();

			$valorTotal = $cartController->calculaValorTotal();

			$viewModel = array(
				'valorTotal' => $valorTotal,
			);

			$this->setRoute($this->view->getAccessRoute());
			$this->showView($viewModel);
		
			return;
		}		

		$this->setRoute($this->view->getAccessRoute());
		$this->showView();
		
		return;
	}
	
}