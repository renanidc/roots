<?php

class AdminDao
{
	public function __construct()
	{
		
	}
	
	public function authenticate($email, $password)
	{		
		$sql = "SELECT * FROM admin WHERE email = '" . $email . "' AND senha = '" . $password ."'";
		
		$query = pg_query($sql);
		
		$obj = pg_fetch_object($query);
		
		if(!$obj)
			return false;
				
		$admin = new Admin();
		$admin->setId($obj->id);
		$admin->setEmail($obj->email);
		
		return $admin;	
	}
}