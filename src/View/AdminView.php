<?php

class AdminView
{
	public function __contruct(){}
	
	public function getIndexRoute()
	{
		return 'user/index.php';
	}
	public function getLoginRoute()
	{
		return 'admin/index.php';
	}
	public function getAccessRoute()
	{
		return 'admin/admin-dashboard.php';
	}
}