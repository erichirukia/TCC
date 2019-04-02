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
    $nome1='';
    if(isset($_POST["nome1"])){
        $nome1=$_POST['nome1'];
    }
    $sobrenome1='';
    if(isset($_POST["sobrenome1"])){
        $sobrenome1=$_POST['sobrenome1'];
    }
    $email1='';
    if(isset($_POST["email1"])){
        $email1=$_POST['email1'];
    }
    $cpf1='';
    if(isset($_POST["cpf1"])){
        $cpf1=$_POST['cpf1'];
    }
    $fone1='';
    if(isset($_POST["fone1"])){
        $fone1=$_POST['fone1'];
    }
    $password1='';
    if(isset($_POST["password1"])){
        $password1=$_POST['password1'];
    }
    $passwordConfirm1='';
    if(isset($_POST["password-confirm1"])){
        $passwordConfirm1=$_POST['password-confirm1'];
    }



    if($password1 !=  $passwordConfirm1){
        header("Location: ../view/cadastroProp.php");
        echo "<div class='alert alert-danger' role='alert'>
                                <span class='fa fa-window-close-o'></span>
                                Oss dois campos pra senha estão diferentes
                            </div>";
        
    }else{
        $sql="insert into usuarios (id, email, password, nome, sobrenome, cpf, nivel, fone) values('NULL', '$email1','$password1','$nome1','$sobrenome1','$cpf1','Proprietário','$fone1')";
        $salvar = mysqli_query($connect,$sql);
        header("Location: ../view/pagAdmin.php");
    }

    
?>