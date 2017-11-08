<?php

class ProductController extends Controller{

	public function __construct(){
		$this->view = new ProductView();
	}

	public function indexAction(){
		return;
	}

	public function viewProductAction(){

		$id =  array_key_exists ('id', $_REQUEST) ? $_REQUEST['id'] : '';
		$produtoDao = new ProductDao();

		$viewModel = array(
				'produto' => $produtoDao->getProduto($id),
		);

		$this->setRoute($this->view->getProductViewRoute());
		$this->showView($viewModel);
	}

	public function buscarPorNomeAction(){

		$nome = array_key_exists ('nome', $_REQUEST) ? $_REQUEST['nome'] : '';
		$produtoDao = new ProductDao();
		
		$viewModel = array(
			'produtos' => $produtoDao->buscarPorNome($nome),
		);
		
		$this->setRoute($this->view->getBuscarPorNomeRoute());
		
		$this->showView($viewModel);
		
		return;
	}

	public function AddAction(){

		include "system/UploadImagem.php";

		$message = Message::singleton();
		
		$viewModel = array();
		
		if(array_key_exists ('save', $_REQUEST))
		{
			$nome =  array_key_exists ('nome', $_REQUEST) ? $_REQUEST['nome'] : '';

			$descricao =  array_key_exists ('descricao', $_REQUEST) ? $_REQUEST['descricao'] : '';

			$preco =  array_key_exists ('preco', $_REQUEST) ? $_REQUEST['preco'] : '';

			$medida =  array_key_exists ('medida', $_REQUEST) ? $_REQUEST['medida'] : '';

			$quantidade =  array_key_exists ('quantidade', $_REQUEST) ? $_REQUEST['quantidade'] : '';

			$dataValidade =  array_key_exists ('dataValidade', $_REQUEST) ? $_REQUEST['dataValidade'] : '';

			$foto =  array_key_exists ('foto', $_REQUEST) ? $_REQUEST['foto'] : '';
		  
		  	try
			{
			
				$produto = new Product();
				$produto->setNome($nome);
				$produto->setDescricao($descricao);
				$produto->setPreco($preco);
				$produto->setMedida($medida);
				$produto->setQuantidade($quantidade);
				$produto->setDataValidade($dataValidade);				

				//Fazer upload da imagem
				$upload = new UploadImagem($_FILES['foto'], 1000, 800, "assets/imagens/produtos/");
				
				//Envia foto para o servidor e recebe o novo nome do arquivo
				$foto = $upload->salvar();
				
				$produto->setFoto("assets/imagens/produtos/".$foto);
				
				$productDao = new ProductDao();	
			
				if($productDao->insert($produto))
					$message->addMessage('Produto cadastrado com sucesso!');
					$this->setRoute($this->view->getAddRoute());
			}
			catch(Exception $e)
			{
				$this->setRoute($this->view->getAddRoute()); 
				
				$message->addWarning($e->getMessage());
			}
		}
		else
			$this->setRoute($this->view->getAddRoute()); 
		
		$this->showView($viewModel);

		return;
	}		
}