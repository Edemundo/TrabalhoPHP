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
          <h2 class="subtitle level-item">Alterar Usuário</h2>
          <br>
        </div>
        <ul id="mensagens-erro"></ul>
        <form name="cadastro" method="post" action="alterarUsuario.php">
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
            <p class="control has-icons-left has-icons-right">
              <input class="input" id="senha_novamente" type="password" placeholder="Digite a senha novamente" name="senha_novamente">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="field has-addons has-addons-centered">
            <p class="control">
              <button id="btnCadastro" class="button is-success" name="btnAltUser">
                Alterar
              </button>
            </p>
          </div>
        </form>
        <br>
        <a class="field has-addons has-addons-centered" href="cadastrar.php">Não tem uma conta? </a>
        <br>
      </nav>
            <?php
      if(isset($_POST['btnAltUser']))		
      {		
            //inicio da autenticação do usuário
            include '../php/conexao.php';
              
            require_once '../php/conexao.php';	//inclui a conexao com o banco de dados
  
          //transforma tudo em string para não receber sql injection
          //e nao aceita codigo
          $senha = md5(trim($_POST["senha"]));;
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
            ?>
                <h2 class="subtitle level-item">Senha alterada com sucesso!</h2>
            <?php
          }
      }
    ?>
        </article>
        <script src="../js/footer.js"></script>
        <script src="../js/cadastro.js"></script>
    </body>
    </html>