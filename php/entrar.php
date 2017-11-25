<?php
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $query = mysqli_query($conexao, "select (email, senha) from clientes where email = ('{$email}')";
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');

    $queryConsulta = "SELECT * FROM usuarios WHERE ds_usuario = '$email'";
    $resultado = mysqli_query($conexao, $queryConsulta);
    $checarResultado = mysqli_num_rows($resultado);
    if($checarResultado < 1)
    {
        // email não existe
    }
    else
    {
        if ($row = mysqli_fetch_assoc($resultado)) {

            if ($senha != $row['senha']) 
            {
            // senha incorreta
            }
            elseif ($senha == $row['senha']) 
            {
                $_SESSION['email'] = $row['email'];
            }
        }
    }
?>