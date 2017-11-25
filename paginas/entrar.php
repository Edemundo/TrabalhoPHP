<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Venda Bem Caminhoneiro</title>
    <link rel="icon" href="../images/titanis_blindagem.jpg">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
</head>

<body>
    <script src="../js/header.js"></script>
    <article>
        <!-- Form -->
        <nav>
            <ul id="mensagens-erro"></ul>
            <form name="cadastro" method="post" action="../php/entrar.php">
                <div class="field has-addons has-addons-centered">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" id="email" type="email" placeholder="Digite seu email" name="email">
                        <span class="icon is-small is-left">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </p>
                </div>
                <div class="field has-addons has-addons-centered">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" id="senha" type="password" placeholder="Digite a senha" name="senha">
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field has-addons has-addons-centered">
                    <p class="control">
                        <button id="btnEntrar" class="button is-success" name="btnEntrar">
                            Login
                        </button>
                    </p>
                </div>
            </form>
        </nav>
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
                ?>
                <h2 class="subtitle level-item">Usuário não cadastrado!</h2>
                <?php
            }
            else
            {
                if ($row = mysqli_fetch_assoc($resultado)) {

                    if ($senha != $row['senha']) 
                    {
                    ?>
                        <h2 class="subtitle level-item">Senha incorreta!</h2>
                    <?php
                    }
                    elseif ($senha == $row['senha']) 
                    {
                        $_SESSION['email'] = $row['email'];
                    }
                }
            }
        ?>
    </article>

    <script src="../js/footer.js"></script>
    <script src="../js/entrar.js"></script>
</body>

</html>