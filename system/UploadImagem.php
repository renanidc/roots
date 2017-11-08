<?php

	class UploadImagem{
		private $arquivo;
		private $altura;
		private $largura;
		private $pasta;

		function __construct($arquivo, $altura, $largura, $pasta){
			$this->arquivo = $arquivo;
			$this->altura  = $altura;
			$this->largura = $largura;
			$this->pasta   = $pasta;
		}
		
		private function getExtensao(){
			//retorna a extensao da imagem
			$nome = $this->arquivo['name'];
			$arr = explode('.', $nome);
			$extensao = end($arr);
			return $extensao;  
		}
		
		private function ehImagem($extensao){
			$extensoes = array('gif', 'jpeg', 'jpg', 'png');	 // extensoes permitidas
			if (in_array($extensao, $extensoes))
				return true;			
		}
		
		//largura, altura, tipo, localizacao da imagem original
		private function redimensionar($imgLarg, $imgAlt, $tipo, $img_localizacao){
			
			//Definir novo tamanho
			$novaLarg=800;
			$novaAlt=500;
			
			//cria uma nova imagem com o novo tamanho	
			$novaimagem = imagecreatetruecolor($novaLarg, $novaAlt);
			
			switch ($tipo){
				case 1:	// gif
					$origem = imagecreatefromgif($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagegif($novaimagem, $img_localizacao);
					break;
				case 2:	// jpg
					$origem = imagecreatefromjpeg($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagejpeg($novaimagem, $img_localizacao);
					break;
				case 3:	// png
					$origem = imagecreatefrompng($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagepng($novaimagem, $img_localizacao);
					break;
			}
			
			//destroi as imagens criadas
			imagedestroy($novaimagem);
			imagedestroy($origem);
		}
		
		public function salvar(){									
			$extensao = $this->getExtensao();
			
			//Teste extensões válidas (segurança)
			if($extensao!="gif" and $extensao!="jpeg" and $extensao!="jpg" and $extensao!="png" ){			
				exit("Extensão .".$extensao." não permitida!</br>".
				"Extensãos permitidas são: .gif, .jpeg, .jpg ou .png.");
			}
			
			//Gera um nome único para a imagem em função do tempo
			$novo_nome = time() . '.' . $extensao;
			//Localização do arquivo 
			$destino = $this->pasta . $novo_nome;
			
			//Move o arquivo
			if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
				if ($this->arquivo['error'] == 1)
					return "Tamanho excede o permitido";
				else
					return "Erro " . $this->arquivo['error'];
			}
				
			if ($this->ehImagem($extensao)){												
				//Pega a largura, altura, tipo e atributo da imagem
				list($largura, $altura, $tipo, $atributo) = getimagesize($destino);

				//Redimensiona a imagem		
				$this->redimensionar($largura, $altura, $tipo, $destino);
			}
			return $novo_nome;
		}						
	}
?>
