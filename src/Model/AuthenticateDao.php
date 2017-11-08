<?php

class AuthenticateDao
{
	public function __construct()
	{
		
	}
	public function authenticate($email, $senha)
	{		
		$sql = "SELECT * FROM usuario WHERE email = '" . $email . "' AND senha = '" . Md5($senha) ."'";
		
		$query = pg_query($sql);
		
		$obj = pg_fetch_object($query);
		
		if(!$obj)
			return false;
				
		$user = new User();
		$user->setId($obj->id);
		$user->setEmail($obj->email);
				
		return $user;	
	}
}