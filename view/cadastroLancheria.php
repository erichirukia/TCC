<?php
    session_start();
    $host = "localhost";
    $login = "root";
    $senha = "";
    $banco = "tcc";
                
    //Efetuando a conexão
    $connect = new mysqli($host, $login, $senha, $banco);
    if($connect->connect_error){
        echo "Erro ao conectar ao banco de dados!";
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
        <link href="../lib/css/style.css" rel="stylesheet">
        <link href="../lib/font/css/font-awesome.min.css"  rel="stylesheet">
    </head>
    <body>
        <header>
            <div class = "div-header container-fluid">
                <nav class="navbar navbar-inverse navbar-expand-md">    
                    <div class="navbar navbar-default col-lg-12">
                        <div class="navbar-header col-lg-8" >
                            <img src="../images/logo.png" id="logo">
                            <button class="navbar-toggler navbar-dark navbar-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="ola">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse col-lg-4" id="navbarCollapse">
                            <ul class="navbar-nav text-md-center nav-justified w-100">
                                <li><a id="link-header" class="btn navbar-btn navbar-right" href="pagAdmin.php"> Pagina inicial</a></li>
                                <li><a id="link-header" class="btn navbar-btn navbar-right" href="cadastroProp.php"> Cadastrar Proprietário </a></li>
                                <li class="btn-group">
                                        <a href="../controller/sair.php" id="bbb"><button class="btn navbar-btn navbar-right" id="btn-azul">Log Out</buttton></a>
                                </li>        
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <form action="../controller/cadastroLancheria.func.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <legend>Adicionar Lancheria</legend>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputNome" id="label">Nome</label>  
                    <div class="col-md-4">
                        <input name="nome" class="form-control input-md" required="" type="text" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputSobrenomeome" id="label">Rua</label>  
                    <div class="col-md-4">
                        <input name="rua"  class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputEmail" id="label">Número</label>  
                    <div class="col-md-4">
                        <input name="numero" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">Bairro</label>
                    <div class="col-md-4">
                        <input name="bairro" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">Telefone</label>
                    <div class="col-md-4">
                        <input name="fone" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">CPF Proprietário</label>
                    <div class="col-md-4">
                        <input name="cpf" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">CNPJ</label>
                    <div class="col-md-4">
                        <input name="cnpj" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">Imagem</label>
                    <div class="col-md-4">
                        <input name="img" class="form-control input-md" type="file">
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-8">
                        <button name="salvar" class="btn">
                            Salvar
                        </button>
                        <a href="#">
                            <button type="button" class="btn btn-danger">
                                Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <footer >
        <div id="contentCurve"></div>
            <p> @ No Copyrights</p>
            <p> Produzido por Eric Farias </p>
            <a href="https://twitter.com/EricHirukia"><img class="footerImg" src="../images/Twitter-icon.png"></a>
            <a href="https://www.facebook.com/ericfs.hirukia"><img class="footerImg" src="../images/face.png"></a>
            <a href="https://www.instagram.com/ericfs_2202/"><img class="footerImg" src="../images/instagram-icon.png"></a>
        </footer>
    </body>    
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/popper/popper.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../lib/highcharts/code/highcharts.js"></script>
        <script src="../lib/highcharts/code/modules/exporting.js"></script>
</html>