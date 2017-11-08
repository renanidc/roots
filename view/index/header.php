<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Roots</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/heroic-features.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="menu navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#">
                    <img class="logotipo" src="assets/imagens/logo.png">
                </a>
            </div>                      
                
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse opcoes" id="bs-example-navbar-collapse-1"> 

                <!-- Formulário de pesquisa -->
                <form action="index.php?controller=Product&action=buscarPorNome" class="navbar-form navbar-left" role="search" method="POST">
                    <div class="input-group pesquisar">
                        <input type="text" name="nome" class="form-control" placeholder="Buscar...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>               

                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php?controller=User&action=add">Cadastre-se</a>
                    </li>
                    <li>
                        <a href="index.php?controller=User&action=login"> Entre</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Conteúdo da página -->
    <div class="container">