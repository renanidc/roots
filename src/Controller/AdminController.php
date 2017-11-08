<?php

class AdminController extends Controller{

	public function __construct(){
		$this->view = new AdminView();
	}

	public function indexAction(){
		return;
	}
	
}