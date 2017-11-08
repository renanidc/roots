<?php

try
{
	require ('config/autoload.php');
	require ('config/config.inc.php');
	require ('config/connect.php');
	//require ('system/Database.php');
	
	session_start();

	$_REQUEST['controller'] = !isset($_REQUEST['controller']) ? 'Index' : $_REQUEST['controller'];

	$_REQUEST['action'] = !isset($_REQUEST['action']) ? 'index' : $_REQUEST['action'];

	eval('$controller = new ' . $_REQUEST['controller'] . 'Controller();');
		
	eval('$controller->'.$_REQUEST['action'].'Action();');

	
}
catch(Exception $e)
{
	error_log($e->getMessage());
}
