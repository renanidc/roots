<?php

function __autoload($class)
{
	switch($class)
	{
		case 'Controller': 
			require_once('system/Controller.php');
			break;
		case 'Message': 
			require_once('system/Message.php');
			break;
		case 'IndexController': 
			require_once('src/Controller/IndexController.php');
			break;
		case 'AuthenticateController': 
			require_once('src/Controller/AuthenticateController.php');
			break;
		case 'AdminAuthenticateController':
			require_once('src/Controller/AdminAuthenticateController.php');
		case 'AdminView':
			require_once('src/View/AdminView.php');
		case 'AdminDao':
			require_once('src/Model/AdminDao.php');
		case 'Admin': 
			require_once('src/Model/Admin.php');
			break;
		case 'IndexView': 
			require_once('src/View/IndexView.php');
			break;
		case 'CartController':
			require_once('src/Controller/CartController.php');
			break;
		case 'UserController': 
			require_once('src/Controller/UserController.php');
			break;
		case 'ProductController':
			require_once('src/Controller/ProductController.php');
			break;
		case 'Product':
			require_once('src/Model/Product.php');
		case 'ProductView':
			require_once('src/View/ProductView.php');
			break;
		case 'ProductDao':
			require_once('src/Model/ProductDao.php');
			break;
		case 'UserView': 
			require_once('src/View/UserView.php');
			break;
		case 'AuthenticateView': 
			require_once('src/View/AuthenticateView.php');
			break;
		case 'User': 
			require_once('src/Model/User.php');
			break;
		case 'UserDao': 
			require_once('src/Model/UserDao.php');
			break;
		case 'AuthenticateDao': 
			require_once('src/Model/AuthenticateDao.php');
			break;
	}
}