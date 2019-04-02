<?php
session_start();
if(empty($_SESSION['id'])){
    header("Location: ../index.php");	
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tasted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"
			type="image/png"
			href="../images/icone2.png">
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../lib/css/usuario.css" rel="stylesheet">
        <link href="../lib/font/css/font-awesome.min.css"  rel="stylesheet">
    </head>
    <body>
        <header>
            <div class = "div-header container-fluid">
                <nav class="navbar navbar-inverse navbar-expand-md">    
                    <div class="navbar navbar-default col-lg-12">
                        <div class="navbar-header col-lg-6" >
                            <img src="../images/logo.png" id="logo">
                            <button class="navbar-toggler navbar-dark navbar-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="ola">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse col-lg-6" id="navbarCollapse">
                            <ul class="navbar-nav text-md-center nav-justified w-100">
                                <li class="btn-group navbar-right">
                                    <a href=" minhaConta.php" id="bbb"><button class="btn navbar-btn navbar-right" id="btn-azul"><span class="fa fa-user"></span><?php echo " ".$_SESSION['nome'];?></buttton></a>
                                    <a href="../controller/sair.php" id="bbb"><button class="btn navbar-btn navbar-right" id="btn-azul">Log Out</buttton></a>
                                </li>        
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <br><br>
        <div class="row">
            <div class="col-lg-6">
            <h4>Cadastrar Estabelecimento</h4>
            <a href="cadastroLancheria.php">
                <button type="button" class="btn btn-outline-secondary">
                    <span class="fa fa-university fa-3x"></span>
                </button>
            </a>
            </div>
            <div class="col-lg-6">
            <h4>Cadastrar Proprietário</h4>
            <a href="cadastroProp.php">
                <button type="button" class="btn btn-outline-secondary">
                <span class="fa fa-user fa-3x"></span>
                </button>
            </a>
            </div>
        </div>
    </body>    
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/popper/popper.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/highcharts/code/highcharts.js"></script>
    <script src="../lib/highcharts/code/modules/exporting.js"></script>
</html>