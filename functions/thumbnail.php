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

    function getThumbnail($connect){
        
        $sql = "SELECT * FROM lancherias ORDER BY media_geral DESC";
        $result = $connect->query($sql);
        $array = $result->fetch_all(MYSQLI_ASSOC);

        echo "<div class='container'>";
            echo "<h2 id='titulo-thumb'> Lancherias </h2>";
            echo "<section class='thumbnail-line col-lg-12'>";
        foreach($array as $key => $value){
            echo "<div class ='thumbnail col-lg-3 col-sm-6'>";
                echo "<div class='col-lg-12'>";
                        echo "<div class='teste col-lg-12'>";
                            echo "<a href='../view/avaliacao.php?lancheria=".$value['nome']."&codigo=".$value['id']."&rua=".$value['rua']."&num=".$value['numero']."&bairro=".$value['bairro']."&fone=".$value['fone']."&img=".$value['img']."&media_geral=".$value['media_geral']."&cpf_prop=".$value['cpf_prop']."'><img class='img-fluid' src= '/TCC/images/".$value['img']."'></a>";
                            echo "<div class='nome-thumb'>";
                                echo "<span class ='aaa'>".$value['nome']."</span>";
                                echo "<span class ='aaa2'>".$value['media_geral']."</span><span class='star fa fa-star'></span>";
                            echo "</div>";
                        echo "</div>";
                echo "</div>";
            echo "</div>";
        }
            echo "</section>";
        echo "</div>";
    }
?>