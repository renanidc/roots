<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Entrar</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      body{
        background: #FFFFFF;
      }
      .texto-logo{
        color:#000000;
      }
      .cadastrar{
        color:#000000;
      }
      a:visited{
        color:#0040FF;
      }
      a:link{
        color:#0040FF;
      }
    </style>
  </head>

  <body>

    <div class="container">
      
      <img class="logo-grande" src="assets/imagens/logo-grande.png">
      <h2 class="texto-logo">Admin</h2>
      
      <form class="form-signin" action="index.php?controller=AdminAuthenticate&action=login" method="POST">

        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="save">Entrar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>