<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WebApp (v.05)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="bootstrap/dist/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

       
       <form class="form-signin" method="post" action="index.php?controller=Authenticate&action=logon">
        <h2 class="form-signin-heading">Logon</h2>
        <input type="text" class="input-block-level" placeholder="Email" name="email">
        <input type="password" class="input-block-level" placeholder="Senha" name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Lembrar me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/bootstrap-transition.js"></script>
    <script src="bootstrap/dist/bootstrap-alert.js"></script>
    <script src="bootstrap/dist/bootstrap-modal.js"></script>
    <script src="bootstrap/dist/bootstrap-dropdown.js"></script>
    <script src="bootstrap/dist/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/dist/bootstrap-tab.js"></script>
    <script src="bootstrap/dist/bootstrap-tooltip.js"></script>
    <script src="bootstrap/dist/bootstrap-popover.js"></script>
    <script src="bootstrap/dist/bootstrap-button.js"></script>
    <script src="bootstrap/dist/bootstrap-collapse.js"></script>
    <script src="bootstrap/dist/bootstrap-carousel.js"></script>
    <script src="bootstrap/dist/bootstrap-typeahead.js"></script>

  </body>
</html>
