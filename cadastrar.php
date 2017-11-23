<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    md5($senha,)
    
    $query = "insert into clientes (email, senha) values ('{$email}', {$senha})";
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');
    
    if(mysqli_query($conexao, $query)) {
    ?>
        <p id="sucesso">Sucesso</p>
    <?php
    } else {
    ?>
    <p id="sucesso"> Não foi possível cadastrar</p>
    <?php
    }
    mysqli_close($conexao);   
?>