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

if(!empty($_POST['q1'])){
    if(!empty($_POST['q2'])){
        if(!empty($_POST['q3'])){
            if(!empty($_POST['q4'])){
                if(!empty($_POST['q5'])){
                    if(!empty($_POST['q6'])){
                        if(!empty($_POST['q7'])){
                            if(!empty($_POST['q8'])){
                                if(!empty($_POST['q9'])){
                                    if(!empty($_POST['q10'])){
                                        if(!empty($_POST['q11'])){
                                            if(!empty($_POST['q12'])){
                                                if(!empty($_POST['q13'])){
                                                    $q1 = $_POST['q1'];
                                                    $q2 = $_POST['q2'];
                                                    $q3 = $_POST['q3'];
                                                    $q4 = $_POST['q4'];
                                                    $q5 = $_POST['q5'];
                                                    $q6 = $_POST['q6'];
                                                    $q7 = $_POST['q7'];
                                                    $q8 = $_POST['q8'];
                                                    $q9 = $_POST['q9'];
                                                    $q10 = $_POST['q10'];
                                                    $q11 = $_POST['q11'];
                                                    $q12 = $_POST['q12'];
                                                    $q13 = $_POST['q13'];

                                                    $media1 = ($q1 + $q2 + $q3 + $q4)/4;
                                                    $media2 = ($q5 + $q6)/2;
                                                    $media3 = ($q7 + $q8 + $q9 + $q10 + $q11)/5;
                                                    $media4 = ($q12 + $q13)/2;
                                                    $media = ($q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13)/13;

                                                    $idLancheria = $_GET['codigo'];
                                                    $id_usuario = $_SESSION['id'];
                                                    
                                                    //Salvar no banco de dados
                                                    $sql = "INSERT INTO avaliacao (data_hora, id_lancheria, q1, q2, q3, q4, media1, q5, q6, media2, q7, q8, q9, q10, q11, media3, q12, q13, media4, id_usuario, media_geral) VALUES ( NOW(), '$idLancheria', '$q1', '$q2', '$q3', '$q4', '$media1', '$q5', '$q6', '$media2', '$q7', '$q8', '$q9', '$q10', '$q11', '$media3', '$q12', '$q13', '$media4', '$id_usuario', '$media')";
                                                    $result = mysqli_query($connect, $sql) or die('erro->'.mysqli_error($connect));

                                                    $media_geral= "SELECT AVG(media_geral) as media_geral FROM avaliacao WHERE id_lancheria = '$idLancheria'";
                                                    $result_geral = $connect->query($media_geral);
                                        
                                                    $m_geral = mysqli_fetch_array($result_geral);
                                                    $avg_geral=$m_geral['media_geral'];
                                                    

                                                    if($result === true){
                                                        $sql_update= "UPDATE lancherias SET media_geral = round('$avg_geral', 1) WHERE id = '$idLancheria'";
                                                        $result_update = mysqli_query($connect, $sql_update) or die('erro->'.mysqli_error($connect));
                                                    }


                                                    
                                                    if(mysqli_insert_id($connect)){
                                                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                                                <span class='fa fa-window-close-o'></span>
                                                                                Erro ao cadastrar a avaliação!
                                                                            </div>";
                                                        header("Location: ../view/pagEstabelecimentos.php");
                                                    }else{
                                                        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
                                                                                <span class='fa fa-check'></span>
                                                                                Avaliação cadastrada com sucesso!
                                                                            </div>";
                                                        header("Location: ../view/pagEstabelecimentos.php");
                                                    }
                                                }else{
                                                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                                            <span class='fa fa-window-close-o'></span>
                                                                            Necessário selecionar pelo menos 1 estrela!
                                                                        </div>";
                                                    header("Location: ../view/pagEstabelecimentos.php");
                                                }
                                            }else{
                                                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                                        <span class='fa fa-window-close-o'></span>
                                                                        Necessário selecionar pelo menos 1 estrela!
                                                                    </div>";
                                                header("Location: ../view/pagEstabelecimentos.php");
                                            }
                                        }else{
                                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                                    <span class='fa fa-window-close-o'></span>
                                                                    Necessário selecionar pelo menos 1 estrela!
                                                                </div>";
                                            header("Location: ../view/pagEstabelecimentos.php");
                                        }
                                    }else{
                                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                                <span class='fa fa-window-close-o'></span>
                                                                Necessário selecionar pelo menos 1 estrela!
                                                            </div>";
                                        header("Location: ../view/pagEstabelecimentos.php");
                                    }
                                }else{
                                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                            <span class='fa fa-window-close-o'></span>
                                                            Necessário selecionar pelo menos 1 estrela!
                                                        </div>";
                                    header("Location: ../view/pagEstabelecimentos.php");
                                }
                            }else{
                                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                        <span class='fa fa-window-close-o'></span>
                                                        Necessário selecionar pelo menos 1 estrela!
                                                    </div>";
                                header("Location: ../view/pagEstabelecimentos.php");
                            }
                        }else{
                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                    <span class='fa fa-window-close-o'></span>
                                                    Necessário selecionar pelo menos 1 estrela!
                                                </div>";
                            header("Location: ../view/pagEstabelecimentos.php");
                        }
                    }else{
                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                                <span class='fa fa-window-close-o'></span>
                                                Necessário selecionar pelo menos 1 estrela!
                                            </div>";
                        header("Location: ../view/pagEstabelecimentos.php");
                    }
                }else{
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                            <span class='fa fa-window-close-o'></span>
                                            Necessário selecionar pelo menos 1 estrela!
                                        </div>";
                    header("Location: ../view/pagEstabelecimentos.php");
                }
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                        <span class='fa fa-window-close-o'></span>
                                        Necessário selecionar pelo menos 1 estrela!
                                    </div>";
                header("Location: ../view/pagEstabelecimentos.php");
            }
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                    <span class='fa fa-window-close-o'></span>
                                    Necessário selecionar pelo menos 1 estrela!
                                </div>";
            header("Location: ../view/pagEstabelecimentos.php");
        }
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                                <span class='fa fa-window-close-o'></span>
                                Necessário selecionar pelo menos 1 estrela!
                            </div>";
        header("Location: ../view/pagEstabelecimentos.php");
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
                            <span class='fa fa-window-close-o'></span>
                            Necessário selecionar pelo menos 1 estrela!
                        </div>";
    header("Location: ../view/pagEstabelecimentos.php");
}                                                                                                	
