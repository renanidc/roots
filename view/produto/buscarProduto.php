<?php
	if($_USER){
        include('view/index/headerLogado.php');
    }else{
        include('view/index/header.php');
    }  
?>

<!-- Seção de produtos -->
<div class="row text-center">

<?php

	foreach ($produtos as $produto) {?> 	               

	    <a href="index.php?controller=Product&action=viewProduct&id=<?php echo $produto->getId()?>">
	        <div class="col-md-3 col-sm-6 hero-feature">
	            <div class="thumbnail">
	                <img src=<?php echo $produto->getFoto()?> alt=<?php echo $produto->getNome()?>>
	                <div class="caption">
	                    <h3><?php echo $produto->getNome()?></h3>
	                    <h4 class="preço"><?php echo "R$ ". $produto->getPreco()?></h4>
	                </div>
	            </div>
	        </div>
	    </a>

<?php
}
?>            

</div>
<!-- /.row -->

<?php
	include('view/index/footer.php');
?>     