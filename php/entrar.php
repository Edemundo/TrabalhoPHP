<?php
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $query = mysqli_query($conexao, "select (email, senha) from clientes where email = ('{$email}')";
    $conexao = mysqli_connect('localhost', 'root', '', 'loja');

    if(empty($email) || empty($senha)){
        header("Location: ../html/index.html?login=campovazio");
        exit();
    }
    else
    {	
        $queryConsulta = "SELECT * FROM usuarios WHERE ds_usuario = '$email'";
        $resultado = mysqli_query($conexao, $queryConsulta);
        $checarResultado = mysqli_num_rows($resultado);
        if($checarResultado < 1)
        {
            header("Location: ../html/index.html?login=erro2");
            exit();
        }
        else
        {
            if ($row = mysqli_fetch_assoc($resultado)) {

                if ($senha != $row['senha']) 
                {
                    header("Location: ../html/index.html?login=erro1");
                    exit();
                }
                elseif ($senha == $row['senha']) 
                {
                    $_SESSION['email'] = $row['email'];

                    header("Location: ../html/index.html?login=sucesso");
                    exit();
                }
            }
        }
    }
header("Location: ../html/index.html?login=erro");
exit();
?>