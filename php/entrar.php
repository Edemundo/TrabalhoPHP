<?php
    $email = $_POST["eemail"];
    $senha = $_POST["senha"];
    $query = mysqli_query($conexao, "select (email, senha) from clientes where (email) = ('{$email}') and senha =({$senha})";
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');
    if(mysqli_query($conexao, $query))
?>
    <p id="sucesso"></p>
<?php
    } else {
?>
    <p id="sucesso"> email ou senha inválidos</p>
<?php
    }
    mysqli_close($conexao);    
?>