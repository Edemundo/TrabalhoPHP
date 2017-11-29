<?php
  session_start();
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link rel="icon" href="../images/titanis_blindagem.jpg">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
      crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
      crossorigin="anonymous"></script>

  </head>

  <body>
    <script src="../js/header.js"></script>
    <?php
    if(!isset($_SESSION['email']))
    {
      ?>
      <h2 class="subtitle level-item">Você não está conectado</h2>
      <form name="cadastro" method="post" action="entrar.php">
        <div class="field has-addons has-addons-centered">
          <button id="btnEntrar" class="button is-success" name="btnNaoLogado"> Fazer Login Agora</button>
        </div>
      </form>
      <?php 
    }
    else{
      ?>
      <div class="container">
        <br>
        <h2 class="subtitle level-item">Produtos</h2>
      </div>
      <br>
      <br>
      <!-- <div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/1.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title"></h3>
          <p class="card-text">Categoria: Semipesado</p>
          <p class="card-text">Preço: R$ 150.055,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div> -->
      <?php
    include '../php/conexao.php';
    
    require_once '../php/conexao.php';	//inclui a conexao com o banco de dados
    $queryConsulta = "SELECT * FROM caminhoes";
    $resultado = mysqli_query($conexao, $queryConsulta);
    $quantidade = mysqli_num_rows($resultado);
    for($i = 1; $i < $quantidade + 1; $i++)
    {
      $queryLinha = "SELECT * FROM caminhoes WHERE id = $i"; 
      $resultadoLinha = mysqli_query($conexao, $queryLinha);
      $row = mysqli_fetch_assoc($resultadoLinha);
      if($row['quantidade'] == 0)
        continue;
        ?>
        <div class="col-sm-6">
          <div class="card" style="width: 20rem;">
            <?php echo ("<img src=data:image/png;base64,".base64_encode($row['imagem'])."/>");   ?>

            <img class="card-img-top" src="data:image/jpeg;base64," <?php base64_encode($row['imagem'])?> alt=
            <?php $row['modelo']?>>
            <div class="card-block">
              <h3 class="card-title">
                <?php echo($row['montadora']. " ". $row['modelo']) ?> </h3>
              <p class="card-text">Categoria:
                <?php echo($row['categoria']) ?>
              </p>
              <p class="card-text">Preço:
                <?php echo($row['preco']) ?>
              </p>
              <form name="comprar" method="post" action="produto.php">
              <?php echo("<input type=text class=invisivel value=".$i." name=produto>");?>
                <button id="btnComprar" class="button is-success" name="btnComprar">
                  Comprar
                </button>
              </form>
            </div>
          </div>
        </div>
        <?php
      
    }
  }
    
    ?>
    <?php
    if(isset($_POST["btnComprar"]) ){
      include '../php/conexao.php';

      require_once '../php/conexao.php';	//inclui a conexao com o banco de dados
      $produto = $_POST['produto'];
        $queryQtde = "SELECT quantidade FROM caminhoes WHERE id = '$produto'";
        mysqli_query($conexao, $queryQtde);
        $resultado = mysqli_query($conexao, $queryQtde);
        $row = mysqli_fetch_assoc($resultado);
        $qtde = $row['quantidade'];
          $qtde = intval($qtde) - 1;
          // $queryInserir = "UPDATE caminhoes SET modelo = '$modelo', montadora = '$montadora', 
          // categoria = '$categoria', preco = '$preco', quantidade = '$qtde' WHERE modelo = '$modelo'";
          $queryInserir = "UPDATE caminhoes SET quantidade = '$qtde' WHERE id = '$produto'";
          mysqli_query($conexao, $queryInserir);
        }

    }
   ?>
            <script src="../js/footer.js"></script>
  </body>

  </html>