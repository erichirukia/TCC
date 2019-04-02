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
    </head>
    <body>
    <header>
        <div class = "container-fluid">
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-band" href="#">
                        <img src="../images/logo6.png" widht="500" height="100">
                    </a>
                </div>
            </div>
        </div>
    </header>

        <div class="container">
            <?php
                if(isset($_SESSION['msg'])){
                    echo "<br>".$_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <form action="../controller/cadastro.php" method="POST" class="form-horizontal">
                <legend>Crie sua Conta</legend>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputNome" id="label">Nome</label>  
                    <div class="col-md-4">
                        <input id="inputNome" name="nome" placeholder="Digite seu nome" class="form-control input-md" required="" type="text" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputSobrenomeome" id="label">Sobrenome</label>  
                    <div class="col-md-4">
                        <input id="inputSobrenome" name="sobrenome" placeholder="Digite seu sobrenome" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputEmail" id="label">E-mail</label>  
                    <div class="col-md-4">
                        <input id="inputEmail" name="email" placeholder="exemplo@exemplo.com" class="form-control input-md" required="" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputEmail" id="label">CPF</label>  
                    <div class="col-md-4">
                        <input id="inputCPF" name="cpf" placeholder="Digite seu CPF" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputEmail" id="label">Fone</label>  
                    <div class="col-md-4">
                        <input id="inputFone" name="fone" placeholder="Digite seu Telefone" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">Senha</label>
                    <div class="col-md-4">
                        <input id="inputPassword" name="password" placeholder="Escolha uma senha" class="form-control input-md" required="" type="password">
                    </div>
                </div>
                <!-- Password Confirm input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputPassword" id="label">Confirmar Senha</label>
                    <div class="col-md-4">
                        <input id="inputPasswordConfirm" name="password-confirm" placeholder="Confirme sua senha" class="form-control input-md" required="" type="password">
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-8">
                        <button id="button1id" name="button1id" class="btn">
                            Salvar
                        </button>
                        <a href="../index.php">
                            <button type="button" class="btn btn-danger">
                                Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <br><br><br><br>

        <footer >
            <div id="contentCurve"></div>
            <p> @ No Copyrights</p>
            <p> Produzido por Eric Farias </p>
            <a href="https://twitter.com/EricHirukia"><img class="footerImg" src="../images/Twitter-icon.png"></a>
            <a href="https://www.facebook.com/ericfs.hirukia"><img class="footerImg" src="../images/face.png"></a>
            <a href="https://www.instagram.com/ericfs_2202/"><img class="footerImg" src="../images/instagram-icon.png"></a>
        </footer>
        
        <script src="../lib/jquery/jquery.min.js"></script>
  		<script src="../lib/popper/popper.min.js"></script>
  		<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>