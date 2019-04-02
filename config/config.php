<?php

	//Dados do servidor
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