<?php

class IndexController extends Controller
{
	private $view = false;
	
	public function __construct()
	{
		$this->view = new IndexView();
	}
	public function indexAction()
	{
		$this->setRoute($this->view->getLogonRoute());
		
		$this->showView();
		
		return;
	}
	public function getView()
	{
		return $this->view;
	}
}