<?php

class UserDao
{
	public function __construct()
	{
		
	}
	public function insert($user)
	{
		$sql = "INSERT INTO usuario (email, senha) VALUES ('".$user->getEmail()."', '".$user->getPassword()."')";
		
		if(pg_query($sql))
			return true;
		
		return false;	
	}

	public function delete($user)
	{
		$sql = "DELETE FROM userdb WHERE id = " . $user->getId();
		
		if(pg_query($sql))
			return true;
		
		return false;	
	}

	public function update($user)
	{
		$sql = "UPDATE userdb SET name = '".$user->getName()."', email=  '".$user->getEmail()."', active=  '".$user->getActive()."' WHERE id = '".$user->getId()."'";
		
		if(pg_query($sql))
			return true;
		
		return false;	
	}

	public function getAll()
	{
		$sql = "SELECT * FROM userdb";
		
		$query = pg_query($sql);
		
		$users = array();
		
		while($obj = pg_fetch_object($query))
		{
			$user = new User();
			$user->setId($obj->id);
			$user->setName($obj->name);
			$user->setEmail($obj->email);
			$user->setActive($obj->active);

			$users[] = $user; 
		}
		
		return $users;	
	}
	public function getUser($id)
	{
		$sql = "SELECT * FROM userdb WHERE id = " . $id;
		
		$query = pg_query($sql);
		
		$obj = pg_fetch_object($query);
		
		$user = new User();
		
		$user->setId($obj->id);
		$user->setName($obj->name);
		$user->setEmail($obj->email);
		$user->setActive($obj->active);

		return $user;	
	}
	
	public function authenticate($email, $password)
	{		
		$sql = "SELECT * FROM userdb WHERE email = '" . $email . "' AND password = '" . $password ."'";
		
		$query = pg_query($sql);
		
		$obj = pg_fetch_object($query);
		
		if(!$obj)
			return false;
				
		$user = new User();
		$user->setId($obj->id);
		$user->setName($obj->name);
		$user->setEmail($obj->email);
		$user->setActive($obj->active);
		
		return $user;	
	}

	public function validate($email)
	{					
		$sql = "SELECT * FROM usuario WHERE email = '" . $email ."'";
		
		$query = pg_query($sql);
	
		$obj = pg_fetch_object($query);
		
		if($obj)
			return true;	
		
		return false;
	}

	public function updatePassword($user)
	{
					
		$sql = "UPDATE userdb SET password = '".$user->getPassword()."'WHERE id = '".$user->getId()."'";
		
		if(pg_query($sql))
			return true;
		
		return false;
	}
}