<?php
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

    $id_lanc = $_GET['codigo'];
    $id_usuario = $_SESSION['id'];
    $nome_usuario = $_SESSION['nome'];

    $comentario='';
    if(isset($_POST["comentario"])){
        $comentario=$_POST['comentario'];
    }
    
    if(isset($_FILES['img2'])){
        $extensao = strtolower(substr($_FILES['img2']['name'], -4)); //pega extensão do arquivo
        $novo_nome = md5(time()).$extensao; //define o nome do arquivo
        $diretorio = "../images/".$novo_nome; //define o diretorio para onde o arquivo será mandado
  
        $sql="INSERT INTO comentarios (nome, id_usuario, comentario, data_hora, id_lancheria, img) values
        ('$nome_usuario','$id_usuario','$comentario', NOW(), '$id_lanc', '')";
        
        if(move_uploaded_file($_FILES['img2']['tmp_name'], $diretorio)){

            $sql="INSERT INTO comentarios (nome, id_usuario, comentario, data_hora, id_lancheria, img) values
            ('$nome_usuario','$id_usuario','$comentario', NOW(), '$id_lanc', '$novo_nome')";
            
    
        } //efetua o upload
    
        $salvar = mysqli_query($connect,$sql);
        
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
                                <span class='fa fa-check'></span>
                                Comentário cadastrado!
                            </div>";
        header("Location: ../view/pagEstabelecimentos.php");
    }
?>