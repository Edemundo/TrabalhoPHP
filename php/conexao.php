<?php

//script para conexao com o banco de dados

$usuario = 'root';
$senha = '';
$host = 'localhost';
$database = 'projetocaminhao';

$conexao = @mysqli_connect($host, $usuario, $senha, $database) 
OR die ('Não foi possível acessar o banco de dados!' . mysqli_connect_error($conexao));
?>