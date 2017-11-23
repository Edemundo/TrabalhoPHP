<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // md5($senha,)
    
    $query = "insert into clientes (email, senha) values ('{$email}', '{$senha})";
    $conexao = mysqli_connect('localhost', 'root', '', 'projetocaminhao');
    
    if(mysqli_query($conexao, $query)) {
    ?>
    <p class="alert-success">Cliente <?= $email; ?> adicionado com sucesso!</p>
    <?php
    } else {
    ?>
    <p class="alert-danger">O cliente <?= $email; ?> não foi adicionado</p>
    <?php
    }
?>