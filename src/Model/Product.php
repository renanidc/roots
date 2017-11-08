<?php

class Product
{
	private $id;
	private $nome;
	private $descricao;
	private $preco;
	private $medida;
	private $quantidade;
	private $dataValidade;
	private $foto;
	
	public function __construct()
	{

	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getNome()
	{
		return $this->nome;
	}	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getDescricao()
	{
		return $this->descricao;
	}	
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function getPreco()
	{
		return $this->preco;
	}	
	public function setPreco($preco)
	{
		$this->preco = $preco;
	}
	public function getMedida()
	{
		return $this->medida;
	}	
	public function setMedida($medida)
	{
		$this->medida = $medida;
	}
	public function getQuantidade()
	{
		return $this->quantidade;
	}	
	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}
	public function getDataValidade()
	{
		return $this->dataValidade;
	}	
	public function setDataValidade($dataValidade)
	{
		$this->dataValidade = $dataValidade;
	}
	public function getFoto()
	{
		return $this->foto;
	}	
	public function setFoto($foto)
	{
		$this->foto = $foto;
	}
}