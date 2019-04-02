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
                        <div class="navbar-header col-lg-8" >
                            <img src="../images/logo.png" id="logo">
                            <button class="navbar-toggler navbar-dark navbar-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="ola">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse col-lg-4" id="navbarCollapse">
                            <ul class="navbar-nav text-md-center nav-justified w-100">
                                <li><a id="link-header" class="btn navbar-btn navbar-right" href="pagUsuario.php"> Pagina inicial</a></li>
                                <li><a id="link-header" class="btn navbar-btn navbar-right" href="pagEstabelecimentos.php"> Estabelecimentos </a></li>
                                <li class="btn-group">
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
        <div class="container">
            <div class="info col-lg-12">
                <div class="col-lg-12" id="conteudo">
                    <h2 id='titulo-sec'> Olá <?php echo " ".$_SESSION['nome'];?> </h2><br>
                    <p id="texto" class = "text-left">Seja bem vindo a ferramenta Tasted, com ela a população pode avaliar esses locais e saber através de gráficos quais estabelecimentos possuem boa qualidade tanto em produtos quanto em atendimento e higiene dos restaurantes de Guaíba. </p>
                    <br>
                    <p id="texto" class = "text-justify">Colabore conosco dando seu voto para os estabelecimentos cadastrados! </p>
                </div>
            </div>
            <br><br>
            <div class="sla col-lg-12">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <center><table class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Lancheria</th>
                                <th>Media</th>
                            </tr>
                        </thead>
                        <?php
                            $host = "localhost";
                            $login = "root";
                            $senha = "";
                            $banco = "tcc";
                                        
                            //Efetuando a conexão
                            $connect = new mysqli($host, $login, $senha, $banco);
                            if($connect->connect_error){
                                echo "Erro ao conectar ao banco de dados!";
                            }
                            
                            $sql ="SELECT * FROM lancherias ORDER BY media_geral DESC";
                            $resultado = $connect->query($sql);
                            
                            $listar = false;
                          
                            if($resultado->num_rows > 0){
                                $listar = true;
                            }

                            while($registro = $resultado->fetch_assoc()){
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $registro['nome']; ?></td>
                                <td><?php echo $registro['media_geral']; ?></td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table></center>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <br><br>
        <div class="row">
        <div class="col-lg-6">
          <h4>Estabelecimentos</h4>
          <a href="pagEstabelecimentos.php">
            <button type="button" class="btn btn-outline-secondary">
                <span class="fa fa-university fa-3x"></span>
            </button>
          </a>
        </div>
        <div class="col-lg-6">
          <h4>Minha Conta</h4>
          <a href="minhaConta.php">
            <button type="button" class="btn btn-outline-secondary">
              <span class="fa fa-user fa-3x"></span>
            </button>
          </a>
        </div>
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