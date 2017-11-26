<?php
    session_start();
?>

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
                <div class="container">
                    <br>
                    <h2 class="subtitle level-item">Cadastrar Produtos</h2>
                </div>
                <ul id="mensagens-erro"></ul>
                <form name="cadastro" method="post" action="entrar.php">
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
        if(isset($_POST["btnEntrar"]) ){
            include '../php/conexao.php';

            require_once '../php/conexao.php';	//inclui a conexao com o banco de dados
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);


            $email = mysqli_real_escape_string($conexao, $email);
            $senha = mysqli_real_escape_string($conexao, $senha);

            $queryConsulta = "SELECT * FROM clientes WHERE email = '$email'";
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
                    else if ($senha == $row['senha']) 
                    {
                        ?>
                        <h2 class="subtitle level-item">Bem-vindo
                            <?php echo($row['email']) ?>!</h2>
                        <?php
                        $_SESSION['email'] = $row['email'];
                        ?>
                            <?php
                    }
                }
            }
        }
        ?>
        </article>

        <script src="../js/footer.js"></script>
        <script src="../js/entrar.js"></script>
    </body>

    </html>