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

function getHeader($connect){
    echo "<header>";
        echo "<div class = 'container-fluid'>";
            echo "<div class='navbar navbar-default'>";
                echo "<div class='navbar-header'>";
                    echo "<a class='navbar-band' href='#'>";
                        echo "<img src='../images/logo.png' id='logo'>";
                    echo "</a>";
                echo "</div>";
                echo "<div class='btn-group'>";
                    echo "<button class='btn navbar-btn navbar-right' id='btn-azul'><span class='fa fa-user'></span>.$_SESSION['nome'];</buttton>";
                    echo "<button class='btn navbar-btn navbar-right' id='btn-azul'>Log Out</buttton>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
        echo "<div id='linha_vazia'></div>";
        echo "<div class='row row2'>";
            echo "<div id='containerBarra' class='container-fluid'>";
                echo "<ul id='listBarra' class='list-group'>";
                    echo "<a  href='pagUsuario.php'><li class='list-group-item'> Pagina inicial</li></a>";
                    echo "<a  href='pagEstabelecimentos.php'><li class='list-group-item' id='selecionado'> Estabelecimentos</li></a>";
                    echo "<a  href='minhaConta.php'><li class='list-group-item'> Minha Conta</li></a>";
                echo "</ul>";
            echo "</div>";
        echo "</div>";
    echo "</header>";
}

?>