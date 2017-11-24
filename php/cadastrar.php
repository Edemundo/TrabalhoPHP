<?php

    include '../php/conexao.php';

	require_once '../php/conexao.php';	//inclui a conexao com o banco de dados


    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $email = mysqli_real_escape_string($conexao, $email);
	$senha = mysqli_real_escape_string($conexao, $senha);
	    
    $query = "insert into clientes (email, senha) values ('$email', '$senha')";
    mysqli_query($conexao, $query);

    header("Location: ../html/cadastrado.html");
    exit();
?>
