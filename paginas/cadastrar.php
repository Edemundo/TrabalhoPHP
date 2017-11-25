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
      <form name="cadastro" method="post" action="cadastrar.php">
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
            <button id="btnCadastro" class="button is-success" name="btnCadastro">
              Cadastrar
            </button>
          </p>
        </div>
      </form>
    </nav>
    <?php
      if(isset($_POST["btnCadastro"])){
        include '../php/conexao.php';

        require_once '../php/conexao.php';	//inclui a conexao com o banco de dados


        $email = trim($_POST["email"]);
        $senha = md5(trim($_POST["senha"]));

        $email = mysqli_real_escape_string($conexao, $email);
        $senha = mysqli_real_escape_string($conexao, $senha);
        $queryVerificar = "SELECT * FROM clientes WHERE email = '$email'";
        $resultado = mysqli_query($conexao, $queryVerificar);
        $checar_resultado = mysqli_num_rows($resultado);

        if($checar_resultado > 0)
        {
          ?>
            <h2 class="subtitle level-item">Usuário já cadastrado!</h2>
          <?php
        }
        else{
        ?>
          <h2 class="subtitle level-item">Cadastrado com sucesso!</h2>
        <?php
        }
        $query = "insert into clientes (email, senha) values ('$email', '$senha')";
        mysqli_query($conexao, $query);
      }
    ?>
  </article>
  <script src="../js/footer.js"></script>
  <script src="../js/cadastro.js"></script>
</body>
</html>