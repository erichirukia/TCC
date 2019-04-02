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

$nome='';
if(isset($_POST["nome"])){
    $nome=$_POST['nome'];
}
$rua="";
if(isset($_POST['rua'])){
    $rua = $_POST['rua'];
}
$numero="";
if(isset($_POST['numero'])){
    $numero = $_POST['numero'];
}
$bairro="";
if(isset($_POST['bairro'])){
    $bairro = $_POST['bairro'];
}
$fone="";
if(isset($_POST['fone'])){
    $fone = $_POST['fone'];
}
$cpf="";
if(isset($_POST['cpf'])){
    $cpf = $_POST['cpf'];
}
$cnpj="";
if(isset($_POST['cnpj'])){
    $cnpj = $_POST['cnpj'];
}

if(isset($_FILES['img'])){
    $extensao = strtolower(substr($_FILES['img']['name'], -4)); //pega extensão do arquivo
    $novo_nome = $nome.$extensao; //define o nome do arquivo
    $diretorio = "../images/".$novo_nome; //define o diretorio para onde o arquivo será mandado

    move_uploaded_file($_FILES['img']['tmp_name'], $diretorio); //efetua o upload

    $sql = "INSERT INTO lancherias (id, nome, rua, numero, bairro, fone, img, cpf_prop, cnpj) VALUES ('NULL', '$nome', '$rua', '$numero', '$bairro', '$fone', '$novo_nome', '$cpf', '$cnpj')";
    $salvar = mysqli_query($connect,$sql);
      
}

header("Location: ../view/cadastroLancheria.php");

?>