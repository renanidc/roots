<?php

class ProductView
{
	public function __contruct(){}
	
	public function getIndexRoute()
	{
		return 'user/index.php';
	}
	public function getAddRoute()
	{
		return 'admin/admin-dashboard.php';
	}
	public function getProductViewRoute()
	{
		return 'produto/produto.php';
	}
	public function getBuscarPorNomeRoute()
	{
		return 'produto/buscarProduto.php';
	}
}