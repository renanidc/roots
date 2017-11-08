<?php
    if($_USER){
        include('view/index/headerLogado.php');
    }else{
        include('view/index/header.php');
    }  
?>
    	
<!--Custom CSS-->
<link href="assets/css/produto.css" rel="stylesheet">

<div class="row">            
    <div class="col-md-4 item-photo img-responsive">
        <img style="max-width:100%;" src="<?php echo $produto->getFoto() ?>" />
    </div>
   
    <div class="col-md-8 dados-produto" style="border:0px solid gray">
        <form action="index.php?controller=Cart&action=AddToCart&id_produto=<?php echo $produto->getId()?>" method="POST">
            <!-- Dados do vendedor e do produto -->
            <h3><?php echo $produto->getNome() ?></h3>    

            <!-- Preços -->
            <h6 class="title-price"><small>Preço:</small></h6>
            <h3 style="margin-top:0px;"><?php echo "R$ ". $produto->getPreco() ?></h3>
  
            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr">                       
                    <?php
                        if($produto->getMedida()=="Peso"){
                            echo "Quantidade em Quilos";
                        }else{
                            echo "Quantidade em Unidades";
                        }
                    ?>                        
                </h6>                    
                <div>
                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                    <input value="1" name="quantidade" />
                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                </div>
            </div>          
            
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Adicionar ao carrinho</button>
            </div>
        </form>                                        
    </div>                              

    <div class="col-xs-9">
        <ul class="menu-items">
            <li class="active">Detalhes do produto</li>                    
        </ul>
        <div style="width:100%;border-top:1px solid silver">
            <p style="padding:15px;">                        
                    <?php echo $produto->getDescricao()?>                        
            </p>
        </div>
    </div>		
</div>

<hr>


<?php
    include('view/index/footer.php');
?>

<!--Javasript-->
<script type="text/javascript" src="assets/js/produto.js"></script>

