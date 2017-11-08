<?php

class Controller
{
	private $view = false;
	
	private $route;

	public function __contruct(){}
	
	public function showView($viewModel = false)
	{
		if($viewModel)
			foreach ($viewModel as $key => $value)
				eval('$'.$key. ' = $viewModel["$key"];');
		
		$_USER = isset($_SESSION['USER']) ? unserialize($_SESSION['USER']) : false; 

		/*if($_USER)
			include('view/index/headerLogado.php');*/

		include("view/helper/message.php");
		
		include("view/".$this->getRoute());
		
		//include('view/index/footer.php');
	}
	public function getView()
	{
		return $this->view;
	}
	public function setRoute($route)
	{
		$this->route = $route; 
	}
	public function getRoute()
	{
		return $this->route;
	}
}