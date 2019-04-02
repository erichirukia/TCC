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

    if(isset($_POST['ok'])){
        $email = $mysqli->escape_string($_POST['email']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "E-mail invélido";
        }

        $sql = "SELECT * FROM usuarios where email='$email' AND password='$password'";
        $sql_query = $mysqli->query($sql);
        $dados = $sql_query->fetch_assoc();
        $total = $sql_query->num_rows;
    
        if($total == 0){
            echo "O e-mail informado não foi cadastrado no sistema";
        }
    
        if(count($erro) == 0 && $total > 0){
    
            $nova_senha = substr(md5(time()), 0, 6);
            $nscriptografia= md5(md5($nova_senha));

            if(1 == 1){
                $sql = "UPDATE usuarios SET password = '$nscriptografia' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql);
        
                if($sql_query){
                    echo "Senha alterada com sucesso";
                }
            }
        }
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
        <form action="esqueci.php" metod="POST">
            <div class="form-group col-lg-12">
                <label class="col-lg-12" for="textinput" id="label">E-mail <span class="fa fa-user"></span></label>
                <div class="col-lg-5">
                    <input type="email" name="email" placeholder="Digite seu e-mail" class="form-control input-md" required="" autofocus>
                    <br><input type="submit" name="ok" valeu="Ok" id="botao">
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
        
        <script src="../lib/jquery/jquery.min.js"></script>
  		<script src="../lib/popper/popper.min.js"></script>
  		<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>