<?php

class ProductDao
{
	public function __construct()
	{
		
	}
	public function insert($produto)
	{
		$sql = "INSERT INTO produto (nome, descricao, preco, medida, quantidade, foto1, data_validade) VALUES ('".$produto->getNome()."', '".$produto->getDescricao()."' , '".$produto->getPreco()."' , '".$produto->getMedida()."' , '".$produto->getQuantidade()."' , '".$produto->getFoto()."' , '".$produto->getDataValidade()."')";
		
		if(pg_query($sql))
			return true;
		
		return false;	
	}
	public function getProduto($id)
	{
		$sql = "SELECT * FROM produto WHERE id = " . $id;
		
		$query = pg_query($sql);
		
		$obj = pg_fetch_object($query);
		
		$produto = new Product();
		
		$produto->setId($obj->id);
		$produto->setNome($obj->nome);
		$produto->setDescricao($obj->descricao);
		$produto->setPreco($obj->preco);
		$produto->setMedida($obj->medida);
		$produto->setQuantidade($obj->quantidade);
		$produto->setFoto($obj->foto1);

		return $produto;	
	}
	public function buscarPorNome($nome)
	{
		$sql = "SELECT * FROM produto WHERE unaccent(nome) ILIKE ('%".$nome."%') OR nome ILIKE ('%".$nome."%')";

		$query = pg_query($sql);

		$produtos = array();
		
		while($obj = pg_fetch_object($query))
		{
			$product = new Product();
			$product->setId($obj->id);
			$product->setNome($obj->nome);			
			$product->setDescricao($obj->descricao);
			$product->setPreco($obj->preco);
			$product->setMedida($obj->medida);
			$product->setQuantidade($obj->quantidade);
			$product->setFoto($obj->foto1);

			$produtos[] = $product; 
		}
		
		return $produtos;
	}
	public function produtosRecentes()
	{
		$sql = "SELECT id, nome, descricao, preco, medida, quantidade, foto1 FROM produto LIMIT 8";
		
		$query = pg_query($sql);
		
		$produtos = array();
		
		while($obj = pg_fetch_object($query))
		{
			$product = new Product();
			$product->setId($obj->id);
			$product->setNome($obj->nome);			
			$product->setDescricao($obj->descricao);
			$product->setPreco($obj->preco);
			$product->setMedida($obj->medida);
			$product->setQuantidade($obj->quantidade);
			$product->setFoto($obj->foto1);

			$produtos[] = $product; 
		}
		
		return $produtos;
	}
}