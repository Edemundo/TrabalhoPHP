<?php
<<<<<<< HEAD
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $query = mysqli_query($conexao, "select (email, senha) from clientes where email = ('{$email}')";
=======
   include 'conexao.php';
   
   $email = $_POST["email"];
   $senha = md5($_POST["senha"]);

    $email = mysqli_real_escape_string($conexao, $email);
	$senha = mysqli_real_escape_string($conexao, $senha);

    $query = "select * from clientes where email = '$email'";
>>>>>>> af9accd068710d7e0495b0628faf06b406d2eaa1
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