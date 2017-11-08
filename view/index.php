<?php

    if($_USER){
        include('view/index/headerLogado.php');
    }else{
        include('view/index/header.php');
    }            
    
?>

<!-- Banner 1 -->
<header class="banner jumbotron hero-spacer"></header>

<hr>
<center><h1>Por um mundo mais orgânico!</h1>
<p>Unimos produtores e consumidores através da tecnologia.
Tenha acesso a alimentos orgânicos cultivados por produtores locais.</p></center>
<hr>

<!-- Produtos recentes -->
<div class="row">
    <div class="col-lg-12">
        <h3>Produtos recentes</h3>
    </div>
</div>
<!-- /.row -->


<!--Carregar produtos-->
<?php 
    $produtosDao = new ProductDao();
    $produtos = $produtosDao->produtosRecentes();             
?>

<!-- Seção de produtos -->
<div class="row text-center">

    <?php
    for($i = 0; $i <= 7; $i++){

        $produto = $produtos[$i];?>                

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

<!-- Banner 2 -->
<header class="banner-agricultores jumbotron hero-spacer">
    <h1>A história do produtores locais</h1>
    <p>Conheça um pouco da história das pessoas que transformam o mundo através do cultivo de alimentos</p>
</header>

<!-- Seção de agricultores 2 -->
<div class="row text-center">

    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="assets/imagens/agricultores/2.jpg" alt="">
            <div class="caption">
                <h3>Gustavo e Berenice</h3>
                <p>Produtores de Alface, rúcula e agrião. Produzem alimentos orgânicos a mais de 10 anos.</p>
            </div>
        </div>
    </div>

   <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="assets/imagens/agricultores/3.jpg" alt="">
            <div class="caption">
                <h3>Bernandino Antares</h3>
                <p>Produtor de Alface, rúcula e agrião. Produzem alimentos orgânicos a mais de 10 anos.</p>
            </div>
        </div>
    </div>

   <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="assets/imagens/agricultores/4.jpg" alt="">
            <div class="caption">
                <h3>José Augusto</h3>
                <p>Produtor de Alface, rúcula e agrião. Produzem alimentos orgânicos a mais de 10 anos.</p>
            </div>
        </div>
    </div>

   <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="assets/imagens/agricultores/6.jpg" alt="">
            <div class="caption">
                <h3>Irmãos Abreu</h3>
                <p>Produtores de Alface, rúcula e agrião. Produzem alimentos orgânicos a mais de 10 anos.</p>
            </div>
        </div>
    </div>
    
</div>
<!-- /.row -->

<hr>


<?php
    include('view/index/footer.php');
?>
