<?php

class CartController extends Controller{

	public function __construct(){
		$this->view = new AuthenticateView();
	}

	public function indexAction(){
		return;
	}

	public function AddToCartAction(){

		$id_produto =  array_key_exists ('id_produto', $_REQUEST) ? $_REQUEST['id_produto'] : '';

		$quantidade =  array_key_exists ('quantidade', $_REQUEST) ? $_REQUEST['quantidade'] : '';

		$produto = new Product();
		$produtoDao = new ProductDao();
		$produto = $produtoDao->getProduto($id_produto);
		$produto->setQuantidade($quantidade); //Seta quantidade comprada pelo usuário
		
		//Cria uma nova sessão do carrinho se já não houver uma
		if(!isset($_SESSION['CART']))
			$_SESSION['CART'] = array();

		//Adiciona produto na sessão do carrinho
		array_push($_SESSION['CART'], $produto);

		//Atualiza valor total
		$valorTotal = 0;

		$cartController = new CartController();
		$valorTotal = $cartController->calculaValorTotal();

		$viewModel = array(
			'valorTotal' => $valorTotal,
		);

		$this->setRoute($this->view->getAccessRoute());
		$this->showView($viewModel);		

		return;
	}

	public function updateCartAction(){

		$i =  array_key_exists ('i', $_REQUEST) ? $_REQUEST['i'] : '';
			
		$quantidade =  array_key_exists ('quantidade', $_REQUEST) ? $_REQUEST['quantidade'] : '';

		//Copia sessão do carrinho para um array auxiliar
		$array = $_SESSION['CART'];

		//Atualiza quantidade comprada do produto
		$produto = new Product();
		$produto = $array[$i];
		$produto->setQuantidade($quantidade);

		//Array auxiliar recebe o produto com a quantidade atualizada
		$array[$i] = $produto;

		//Sessão do carrinho recebe os valores atualizados do array auxiliar
		$_SESSION['CART'] = $array;


		//Atualiza valor total
		$valorTotal = 0;

		$cartController = new CartController();
		$valorTotal = $cartController->calculaValorTotal();

		$viewModel = array(
			'valorTotal' => $valorTotal,
		);

		$this->setRoute($this->view->getAccessRoute());
		$this->showView($viewModel);
	
		return;
	}
	public function removeItemCartAction(){
		$i =  array_key_exists ('i', $_REQUEST) ? $_REQUEST['i'] : '';

		//Copia sessão do carrinho para um array auxiliar
		$array = $_SESSION['CART'];

		//Remove produto do array auxiliar
		unset($array[$i]);

		//Ordena os valores das chaves do array auxiliar
		sort($array);

		//Sessão do carrinho recebe os valores atualizados do array auxiliar
		$_SESSION['CART'] = $array;

		//Se não há mais itens no carrinho destrói a sessão
		if(sizeof($_SESSION['CART'])<1){
			unset($_SESSION['CART']);

			$this->setRoute($this->view->getAccessRoute());
			$this->showView();

			return;
		}

		//Atualiza valor total
		$valorTotal = 0;

		$cartController = new CartController();
		$valorTotal = $cartController->calculaValorTotal();

		$viewModel = array(
			'valorTotal' => $valorTotal,
		);

		$this->setRoute($this->view->getAccessRoute());
		$this->showView($viewModel);
	
		return;
	}

	public function calculaValorTotal()
	{
		$valorTotal=0;

		foreach ($_SESSION['CART'] as $produto) {

			$valor;

			//Remover pontos dos milhares, milhões...etc do valor
			$valor = str_replace(".","", $produto->getPreco());

			//Substituir virgula dos centavos para ponto
			$valor = str_replace(",",".", $valor);

			$valorTotal = $valorTotal + (floatval($valor) * (int) $produto->getQuantidade()); 
		}

		return $valorTotal;
	}

}