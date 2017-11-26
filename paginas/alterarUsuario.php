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
                            <button id="btnEntrar" class="button is-success" name="btnAltUser">
                                Login
                            </button>
                        </p>
                    </div>
                </form>
            </nav>
        </article>
        <?php

    //confere se o botao foi clicado
	//caso nao tenha sido clicado
	//volta para a pagina principal

	if(isset($_POST['btnAltUser']))		
    {		
			//inicio da autenticação do usuário
	include 'conexao.php';

	require_once 'conexao.php';	//inclui a conexao com o banco de dados

	//transforma tudo em string para não receber sql injection
	//e nao aceita codigo
    $senha = trim($_POST['senha']);
    $email = trim($_POST['email']);
    
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
        $queryInserir = "UPDATE clientes SET email = '$email', senha = '$senha'
         WHERE email = '$email'";
        mysqli_query($conexao, $queryInserir);
    }
        ?>
                <script src="../js/footer.js"></script>
                <script src="../js/entrar.js"></script>
    </body>

    </html>