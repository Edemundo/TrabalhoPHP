<?php

    include '../php/conexao.php';

	require_once '../php/conexao.php';	//inclui a conexao com o banco de dados


    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $email = mysqli_real_escape_string($conexao, $email);
	$senha = mysqli_real_escape_string($conexao, $senha);
    $queryVerificar = "SELECT * FROM clientes WHERE email = '$email'"
    $resultado = mysqli_query($conexao, $queryVerificar);
    $checar_resultado = mysqli_num_rows($resultado);

    if($checar_resultado > 0)
    {
    ?>
        <h1>Usuário já cadastrado</h1>
    <?php
        return;
    }

    $query = "insert into clientes (email, senha) values ('$email', '$senha')";
    mysqli_query($conexao, $query);

    header("Location: ../html/cadastrado.html");
    exit();
?>
