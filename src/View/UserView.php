<?php

class UserView
{
	public function __contruct(){}
	
	public function getIndexRoute()
	{
		return 'user/index.php';
	}
	public function getAddRoute()
	{
		return 'user/add.php';
	}	
	public function getPassRoute()
	{
		return 'user/pass.php';
	}	
	public function getListRoute()
	{
		return 'user/list.php';
	}
	public function getLoginRoute()
	{
		return 'user/login.php';
	}
	public function getEditRoute()
	{
		return 'user/edit.php';
	}
	public function getDeleteRoute()
	{
		return 'user/confirmremove.php';
	}
	public function getAuthenticateRoute()
	{
		return 'index/index.php';
	}

}