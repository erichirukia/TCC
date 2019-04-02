<?php
    include "../functions/thumbnail.php";
    session_start();
    if(empty($_SESSION['id'])){
        header("Location: ../index.php");	
    }

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

        <?php 
            $cpf = $_SESSION['cpf'];
            $lancheria = $_GET['lancheria'];
            $codigo = $_GET['codigo'];
            $rua = $_GET['rua'];
            $num = $_GET['num'];
            $bairro = $_GET['bairro'];
            $fone = $_GET['fone'];
            $img = $_GET['img'];
            $media_princ = $_GET['media_geral'];
            $cpf_prop = $_GET['cpf_prop'];

            if($cpf == $cpf_prop){
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                        <span class='fa fa-window-close-o'></span>
                                        Você não pode avaliar a lancheria da qual é dono!
                                    </div>";
                header("Location: ../view/pagEstabelecimentos.php");
            }

            $media1= "SELECT AVG(media1) as media1 FROM avaliacao WHERE id_lancheria = $codigo";
            $result1 = $connect->query($media1);
            $media2= "SELECT AVG(media2) as media2 FROM avaliacao WHERE id_lancheria = '$codigo'";
            $result2 = $connect->query($media2);
            $media3= "SELECT AVG(media3) as media3 FROM avaliacao WHERE id_lancheria = '$codigo'";
            $result3 = $connect->query($media3);
            $media4= "SELECT AVG(media4) as media4 FROM avaliacao WHERE id_lancheria = '$codigo'";
            $result4 = $connect->query($media4);

            $m1 = mysqli_fetch_array($result1);
            $avg1=$m1['media1'];
            $m2 = mysqli_fetch_array($result2);
            $avg2=$m2['media2'];
            $m3 = mysqli_fetch_array($result3);
            $avg3=$m3['media3'];
            $m4 = mysqli_fetch_array($result4);
            $avg4=$m4['media4'];

            
$graph = "
<script>
Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Gráfico de satisfação'
    },
    subtitle: {
        text: 'Tasted'
    },
    xAxis: {
        categories: [
            'Local',
            'Funcionários',
            'Serviços',
            'Entrega'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Média'
        }
    },
    tooltip: {
        headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
        pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td>' +
            '<td style=\"padding:0\"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '$lancheria',
        data: [$avg1, $avg2, $avg3, $avg4]

    }]
});
</script>";
        ?>
        <div class="container">
            <h2 id='titulo-sec'> Informações: </h2>
        </div>
        <div class="container" id="caixa-branca">
            <div class="info col-lg-12">
                <div class="img col-lg-4">
                    <center><img class="img-perfil-lancheria img-fluid" src="/TCC/images/<?php echo $img?>"></center>
                </div>
                <div class="detalhes col-lg-4">
                    <h2 id="titulo-desc"> <?php echo $lancheria ?> </h2>
                    <br>
                    <p id="texto" class = "text-justify"> Rua: <?php echo $rua ?> </p>
                    <p id="texto" class = "text-justify"> Número: <?php echo $num ?> </p>
                    <p id="texto" class = "text-justify"> Bairro: <?php echo $bairro ?> </p>
                    <p id="texto" class = "text-justify"> Cidade: Guaíba </p>
                    <p id="texto" class = "text-justify"> Fone: (51) <?php echo $fone ?> </p>
                    <p id="texto" class = "text-justify"> Nota: <?php echo $media_princ ?> </p>
                    <br><br>
                    <center><button id="button1id" name="button1id" class="btn" data-toggle="modal" data-target="#myModal"> Ver Gráfico <span class="fa fa-bar-chart"></span> </button></center><br>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-header">
                                <h2 id='titulo-graf'> Gráfico do Estabelecimento: </h2>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body col-lg-12">
                                <div class="col-lg-12 col-sm-6"id="grafico" style="width:90%; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mapa col-lg-4">
                    <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110428.35989136969!2d-51.433666934818405!3d-30.126068365702146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951bd54b43b3fa37%3A0xdfc631cc6686d6de!2zR3Vhw61iYSwgUlM!5e0!3m2!1spt-BR!2sbr!4v1511137471619" width="350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></center>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 id='titulo-sec'> Avalie: </h2><br>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <form method="POST" action="../controller/processa.php?codigo=<?php echo $codigo;?>" enctype="multipart/form-data">
                    <div class="conjunto-quest col-lg-3">
                        <p id="texto" class = "text-center"><b>Local</b></p><hr>
                        <div class="q1">
                            <p id="texto" class = "text-justify">Paredes</p>
                            <input type="radio" id="vazio" name="q1" value="" checked>
                            
                            <label for="1"><i class="fa"></i></label>
                            <input type="radio" id="1" name="q1" value="1">
                            
                            <label for="2"><i class="fa"></i></label>
                            <input type="radio" id="2" name="q1" value="2">
                            
                            <label for="3"><i class="fa"></i></label>
                            <input type="radio" id="3" name="q1" value="3">
                            
                            <label for="4"><i class="fa"></i></label>
                            <input type="radio" id="4" name="q1" value="4">
                            
                            <label for="5"><i class="fa"></i></label>
                            <input type="radio" id="5" name="q1" value="5">
                        </div>
                        <div class="q2">
                            <p id="texto" class = "text-justify">Piso</p>
                            <input type="radio" id="vazio" name="q2" value="" checked>
                            
                            <label for="6"><i class="fa"></i></label>
                            <input type="radio" id="6" name="q2" value="1">
                            
                            <label for="7"><i class="fa"></i></label>
                            <input type="radio" id="7" name="q2" value="2">
                            
                            <label for="8"><i class="fa"></i></label>
                            <input type="radio" id="8" name="q2" value="3">
                            
                            <label for="9"><i class="fa"></i></label>
                            <input type="radio" id="9" name="q2" value="4">
                            
                            <label for="10"><i class="fa"></i></label>
                            <input type="radio" id="10" name="q2" value="5">
                        </div>
                        <div class="q3">
                            <p id="texto" class = "text-justify">Portas e Janelas</p>
                            <input type="radio" id="vazio" name="q3" value="" checked>
                            
                            <label for="11"><i class="fa"></i></label>
                            <input type="radio" id="11" name="q3" value="1">
                            
                            <label for="12"><i class="fa"></i></label>
                            <input type="radio" id="12" name="q3" value="2">
                            
                            <label for="13"><i class="fa"></i></label>
                            <input type="radio" id="13" name="q3" value="3">
                            
                            <label for="14"><i class="fa"></i></label>
                            <input type="radio" id="14" name="q3" value="4">
                            
                            <label for="15"><i class="fa"></i></label>
                            <input type="radio" id="15" name="q3" value="5">
                        </div>
                        <div class="q4">
                            <p id="texto" class = "text-justify">Balcões</p>
                            <input type="radio" id="vazio" name="q4" value="" checked>
                            
                            <label for="16"><i class="fa"></i></label>
                            <input type="radio" id="16" name="q4" value="1">
                            
                            <label for="17"><i class="fa"></i></label>
                            <input type="radio" id="17" name="q4" value="2">
                            
                            <label for="18"><i class="fa"></i></label>
                            <input type="radio" id="18" name="q4" value="3">
                            
                            <label for="19"><i class="fa"></i></label>
                            <input type="radio" id="19" name="q4" value="4">
                            
                            <label for="20"><i class="fa"></i></label>
                            <input type="radio" id="20" name="q4" value="5">
                        </div>
                    </div>
                    <div class="conjunto-quest col-lg-3">
                        <p id="texto" class = "text-center"><b>Funcionários</b></p><hr>
                        <div class="q5">
                            <p id="texto" class = "text-justify">Uniforme</p>
                            <input type="radio" id="vazio" name="q5" value="" checked>
                            
                            <label for="21"><i class="fa"></i></label>
                            <input type="radio" id="21" name="q5" value="1">
                            
                            <label for="22"><i class="fa"></i></label>
                            <input type="radio" id="22" name="q5" value="2">
                            
                            <label for="23"><i class="fa"></i></label>
                            <input type="radio" id="23" name="q5" value="3">
                            
                            <label for="24"><i class="fa"></i></label>
                            <input type="radio" id="24" name="q5" value="4">
                            
                            <label for="25"><i class="fa"></i></label>
                            <input type="radio" id="25" name="q5" value="5">
                        </div>
                        <div class="q6">
                            <p id="texto" class = "text-justify">Atendimento</p>
                            <input type="radio" id="vazio" name="q6" value="" checked>
                            
                            <label for="26"><i class="fa"></i></label>
                            <input type="radio" id="26" name="q6" value="1">
                            
                            <label for="27"><i class="fa"></i></label>
                            <input type="radio" id="27" name="q6" value="2">
                            
                            <label for="28"><i class="fa"></i></label>
                            <input type="radio" id="28" name="q6" value="3">
                            
                            <label for="29"><i class="fa"></i></label>
                            <input type="radio" id="29" name="q6" value="4">
                            
                            <label for="30"><i class="fa"></i></label>
                            <input type="radio" id="30" name="q6" value="5">
                        </div>
                    </div>
                    <div class="conjunto-quest col-lg-3">
                        <p id="texto" class = "text-center"><b>Serviços</b></p><hr>
                        <div class="q7">
                            <p id="texto" class = "text-justify">Qualidade do Produto</p>
                            <input type="radio" id="vazio" name="q7" value="" checked>
                            
                            <label for="31"><i class="fa"></i></label>
                            <input type="radio" id="31" name="q7" value="1">
                            
                            <label for="32"><i class="fa"></i></label>
                            <input type="radio" id="32" name="q7" value="2">
                            
                            <label for="33"><i class="fa"></i></label>
                            <input type="radio" id="33" name="q7" value="3">
                            
                            <label for="34"><i class="fa"></i></label>
                            <input type="radio" id="34" name="q7" value="4">
                            
                            <label for="35"><i class="fa"></i></label>
                            <input type="radio" id="35" name="q7" value="5">
                        </div>
                        <div class="q8">
                            <p id="texto" class = "text-justify">Preços</p>
                            <input type="radio" id="vazio" name="q8" value="" checked>
                            
                            <label for="36"><i class="fa"></i></label>
                            <input type="radio" id="36" name="q8" value="1">
                            
                            <label for="37"><i class="fa"></i></label>
                            <input type="radio" id="37" name="q8" value="2">
                            
                            <label for="38"><i class="fa"></i></label>
                            <input type="radio" id="38" name="q8" value="3">
                            
                            <label for="39"><i class="fa"></i></label>
                            <input type="radio" id="39" name="q8" value="4">
                            
                            <label for="40"><i class="fa"></i></label>
                            <input type="radio" id="40" name="q8" value="5">
                        </div>
                        <div class="q9">
                            <p id="texto" class = "text-justify">Variedade</p>
                            <input type="radio" id="vazio" name="q9" value="" checked>
                            
                            <label for="41"><i class="fa"></i></label>
                            <input type="radio" id="41" name="q9" value="1">
                            
                            <label for="42"><i class="fa"></i></label>
                            <input type="radio" id="42" name="q9" value="2">
                            
                            <label for="43"><i class="fa"></i></label>
                            <input type="radio" id="43" name="q9" value="3">
                            
                            <label for="44"><i class="fa"></i></label>
                            <input type="radio" id="44" name="q9" value="4">
                            
                            <label for="45"><i class="fa"></i></label>
                            <input type="radio" id="45" name="q9" value="5">
                        </div>
                        <div class="q10">
                            <p id="texto" class = "text-justify">Opções de Pagamento</p>
                            <input type="radio" id="vazio" name="q10" value="" checked>
                            
                            <label for="46"><i class="fa"></i></label>
                            <input type="radio" id="46" name="q10" value="1">
                            
                            <label for="47"><i class="fa"></i></label>
                            <input type="radio" id="47" name="q10" value="2">
                            
                            <label for="48"><i class="fa"></i></label>
                            <input type="radio" id="48" name="q10" value="3">
                            
                            <label for="49"><i class="fa"></i></label>
                            <input type="radio" id="49" name="q10" value="4">
                        
                            <label for="50"><i class="fa"></i></label>
                            <input type="radio" id="50" name="q10" value="5">
                        </div>
                        <div class="q11">
                            <p id="texto" class = "text-justify">Atrativos</p>
                            <input type="radio" id="vazio" name="q11" value="" checked>
                            
                            <label for="51"><i class="fa"></i></label>
                            <input type="radio" id="51" name="q11" value="1">
                            
                            <label for="52"><i class="fa"></i></label>
                            <input type="radio" id="52" name="q11" value="2">
                            
                            <label for="53"><i class="fa"></i></label>
                            <input type="radio" id="53" name="q11" value="3">
                            
                            <label for="54"><i class="fa"></i></label>
                            <input type="radio" id="54" name="q11" value="4">
                            
                            <label for="55"><i class="fa"></i></label>
                            <input type="radio" id="55" name="q11" value="5">
                        </div>
                    </div>
                    <div class="conjunto-quest col-lg-3">
                        <p id="texto" class = "text-center"><b>Entrega</b></p><hr>
                        <div class="q12">
                            <p id="texto" class = "text-justify">Velocidade</p>
                            <input type="radio" id="vazio" name="q12" value="" checked>
                            
                            <label for="56"><i class="fa"></i></label>
                            <input type="radio" id="56" name="q12" value="1">
                            
                            <label for="57"><i class="fa"></i></label>
                            <input type="radio" id="57" name="q12" value="2">
                            
                            <label for="58"><i class="fa"></i></label>
                            <input type="radio" id="58" name="q12" value="3">
                            
                            <label for="59"><i class="fa"></i></label>
                            <input type="radio" id="59" name="q12" value="4">
                        
                            <label for="60"><i class="fa"></i></label>
                            <input type="radio" id="60" name="q12" value="5">
                        </div>
                        <div class="q13">
                            <p id="texto" class = "text-justify">Qualidade do Produto</p>
                            <input type="radio" id="vazio" name="q13" value="" checked>
                            
                            <label for="61"><i class="fa"></i></label>
                            <input type="radio" id="61" name="q13" value="1">
                            
                            <label for="62"><i class="fa"></i></label>
                            <input type="radio" id="62" name="q13" value="2">
                            
                            <label for="63"><i class="fa"></i></label>
                            <input type="radio" id="63" name="q13" value="3">
                            
                            <label for="64"><i class="fa"></i></label>
                            <input type="radio" id="64" name="q13" value="4">
                            
                            <label for="65"><i class="fa"></i></label>
                            <input type="radio" id="65" name="q13" value="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="button1id"></label>
                        <div class="botao-centro col-md-12">
                            <button id="buttonid" name="button1id" class="btn">Pronto</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <h2 id='titulo-sec'> Comentários: </h2>
            </div>
            <div class="container">
                <div class="conjunto-quest">
                    <section class="col-lg-12">
                        <?php
                                    $sql = "SELECT * FROM comentarios where id_lancheria='$codigo' ORDER BY id DESC";
                                    
                                    $result = $connect->query($sql);
                               
                                    $row = mysqli_num_rows($result);
                                    if ($row > 0){
                                        while ($linha = mysqli_fetch_array($result)){
                                            $nome = $linha['nome'];
                                            $id = $linha['id_usuario'];
                                            $comentario = $linha['comentario'];
                                            $data = $linha['data_hora'];
                                            $img_coments = $linha['img'];
                                            echo "<br>";
                                            echo "<b>$nome</b> -> $data";
                                            echo "<p id='texto' class = 'text-justify'>$comentario</p>";
                                            if($img_coments != ''){
                                                echo "<img class='img-fluid' src= '/TCC/images/".$img_coments."' width='200px' height='200px'>";
                                            }
                                            echo "<hr>";
                                        }
                                    }else{
                                        echo "<p id='texto' class = 'text-justify'>Nenhum comentário. Seja o primeiro a comentar!</p>";
                                    }
                        ?>
                    </section>
                </div>
            </div>
            <div class="container">
                <h2 id='titulo-sec'> Comente: </h2>
            </div>
            <div class="container">
                <div class="conjunto-quest">
                    <br>
                    <section class="col-lg-12">
                        <form method="POST" action="../controller/coments.php?codigo=<?php echo $codigo;?>" enctype="multipart/form-data">
                            <textarea class="col-lg-12" name="comentario"></textarea>
                            <div class="form-group">
                                <label class="col-md-12" for="button1id"></label>
                                <div class="botao-centro col-lg-12">
                                    <button id="buttonid" name="button1id" class="btn">Enviar</button><br><br><input name="img2" class="form-control input-md" type="file">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
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
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/popper/popper.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../lib/highcharts/code/highcharts.js"></script>
        <script src="../lib/highcharts/code/modules/exporting.js"></script>
        <?php 
        echo $graph;
        ?>
    </body>
</html>