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
    $nome='';
    if(isset($_POST["nome"])){
        $nome=$_POST['nome'];
    }
    $sobrenome='';
    if(isset($_POST["sobrenome"])){
        $sobrenome=$_POST['sobrenome'];
    }
    $email='';
    if(isset($_POST["email"])){
        $email=$_POST['email'];
    }
    $cpf='';
    if(isset($_POST["cpf"])){
        $cpf=$_POST['cpf'];
    }
    $fone='';
    if(isset($_POST["fone"])){
        $fone=$_POST['fone'];
    }
    $password='';
    if(isset($_POST["password"])){
        $password=$_POST['password'];
    }
    $passwordConfirm='';
    if(isset($_POST["password-confirm"])){
        $passwordConfirm=$_POST['password-confirm'];
    }



    if($password !=  $passwordConfirm){
        header("Location: ../view/pagCadastro.php");
        echo "<div class='alert alert-danger' role='alert'>
                                <span class='fa fa-window-close-o'></span>
                                Oss dois campos pra senha estão diferentes
                            </div>";
        
    }else{
        $sql="insert into usuarios (id, email, password, nome, sobrenome, cpf, nivel, fone) values('NULL', '$email','$password','$nome','$sobrenome','$cpf','Usuário','$fone')";
        $salvar = mysqli_query($connect,$sql);

        header("Location: ../index.php");
    }

    
?>