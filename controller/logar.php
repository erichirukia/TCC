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

    $email='';
    if(isset($_POST["email"])){
        $email=$_POST['email'];
    }
    $password='';
    if(isset($_POST["password"])){
        $password=$_POST['password'];
    }
    $sql = "SELECT * FROM usuarios where email='$email' AND password='$password'";
    $result = $connect->query($sql);
    if(!$row = mysqli_fetch_assoc($result)){
        header("Location: ../index.php");
    }else{
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['sobrenome'] = $row['sobrenome'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['nivel'] = $row['nivel'];
            $_SESSION['cpf'] = $row['cpf'];
            $_SESSION['fone'] = $row['fone'];
            if($email === "admin@admin.com"){
                header("Location: ../view/pagAdmin.php");
            }else{
                header("Location: ../view/pagUsuario.php");
            }
    }
?>