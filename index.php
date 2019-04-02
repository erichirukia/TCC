<html>
    <head>
        <meta charset="utf-8">
        <title>Tasted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"
			type="image/png"
			href="images/icone2.png">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/css/style.css" rel="stylesheet">
        <link href="lib/font/css/font-awesome.min.css"  rel="stylesheet">
    </head>
    <body>
    <header>
        <div class = "container-fluid">
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-band" href="#">
                        <img src="images/logo6.png" widht="700" height="100">
                    </a>
                </div>
            </div>
        </div>
    </header>
        <div class = "container">
            <div id="resumo" class = "row"> 
                <div class = "col-md-6 hidden-sm hidden-xs">
                    <h1 id="titulo" class = "text-center">Avaliador de Lancherias e Restaurantes</h1>
                    <br>
                    <p id="texto" class = "text-justify">É de extrema importância saber como estão a higienização e a qualidade tanto dos produtos quanto do atendimento dos locais onde são feitas refeições diariamente, e é para isso que a ferramenta serve, com ela a população pode avaliar esses locais e saber através de gráficos quais estabelecimentos possuem boa qualidade tanto em produtos quanto em atendimento e higiene dos restaurantes de Guaíba.</p> 
                </div>
                <div class="col-md-1"></div>
                <div id="login" class = "col-md-5 col-md-offset-2">
                    
                    <form  action="controller/logar.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <!-- Form Name -->
                        <h3 id = "login_titulo">Login</h3>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12" for="textinput" id="label">E-mail <span class="fa fa-user"></span></label>
                            <div class="col-md-10">
                                <input type="email" name="email" placeholder="Digite seu e-mail" class="form-control input-md" required="" autofocus>
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-12" for="passwordinput" id="label">Senha <span class="fa fa-key"></span></label>
                            <div class="col-md-10">
                                <input type = "password" name="password" placeholder="Digite sua senha" class="form-control input-md" required="" >
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-12" for="button1id"></label>
                            <div class="col-md-12">
                                <button id="button1id" name="button1id" class="btn">Entrar</button>
                                <input type="hidden" name="entrar" value="login">
                                <a href="view/pagCadastro.php">
                                    <button type="button" class="btn btn-link">
                                        Crie sua conta
                                    </button>
                                </a>
                                <a href="/TCC/view/esqueci.php">
                                    <button type="button" class="btn btn-link">
                                        Esqueceu sua senha?
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_SESSION['msg1'])){
                            echo $_SESSION['msg1'];
                            unset($_SESSION['msg1']);
                        }
                    ?>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <footer >
            <div id="contentCurve"></div>
            <p> @ No Copyrights</p>
            <p> Produzido por Eric Farias </p>
            <a href="https://twitter.com/EricHirukia"><img class="footerImg" src="images/Twitter-icon.png"></a>
            <a href="https://www.facebook.com/ericfs.hirukia"><img class="footerImg" src="images/face.png"></a>
            <a href="https://www.instagram.com/ericfs_2202/"><img class="footerImg" src="images/instagram-icon.png"></a>
        </footer>
        
        <script src="lib/jquery/jquery.min.js"></script>
  		<script src="lib/popper/popper.min.js"></script>
  		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>