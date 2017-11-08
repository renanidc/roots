<?php

class AuthenticateView
{
	private $route = 'index/index.php';
	
	public function __contruct(){}
	
	public function getIndexRoute()
	{
		return 'index.php';
	}
	public function getLoginRoute()
	{
		return 'user/login.php';
	}
	public function getAccessRoute()
	{
		return 'user/dashboard/dashboard.php';
	}
	
}