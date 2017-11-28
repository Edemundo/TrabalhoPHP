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
        ?>
        <div class="col-sm-6">
          <div class="card" style="width: 20rem;">
            <?php echo ("<img src=data:image/png;base64,".base64_encode($row['imagem'])."/>");   ?>

            <img class="card-img-top" src="data:image/jpeg;base64," <?php base64_encode($row[ 'imagem'])?> alt=
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
                <button id="btnComprar" class="button is-success" name="btnComprar">
                  Comprar
                </button>
            </div>
          </div>
        </div>
        <?php
      
    }
  }
    ?>
          <!-- <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/2.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Volks 8150</h3>
          <p class="card-text">Categoria: Leve</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/3.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Mercedes 710</h3>
          <p class="card-text">Categoria: Leve</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/4.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Volks 9150</h3>
          <p class="card-text">Categoria: Leve</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/5.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Volks 13180</h3>
          <p class="card-text">Categoria: Médio</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/6.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">FH 460	Volvo</h3>
          <p class="card-text">Categoria: Pesado</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/7.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Mercedes Atego 2425</h3>
          <p class="card-text">Categoria: Semipesado</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/8.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Mercedes Accelo 815</h3>
          <p class="card-text">Categoria: Leve</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/9.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Volvo VM 260</h3>
          <p class="card-text">Categoria: Semipesado</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="../images/10.jpg" alt="Venda Bem Caminhoneiro">
        <div class="card-block">
          <h3 class="card-title">Scania R440</h3>
          <p class="card-text">Categoria: Pesado</p>
          <p class="card-text">Preço: R$ 81.919,00</p>
          <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div> -->
          <?php
    if(isset($_POST["btnComprar"]) ){
      include '../php/conexao.php';

      require_once '../php/conexao.php';	//inclui a conexao com o banco de dados

        $queryQtde = "SELECT quantidade FROM caminhoes WHERE id = '$i'";
        mysqli_query($conexao, $queryQtde);
        $resultado = mysqli_query($conexao, $queryQtde);
        $row = mysqli_fetch_assoc($resultado);
        $qtde = $row['quantidade'];
        if($qtde == 1)
        {
          $sql = "DELETE FROM MyGuests WHERE id=$i";
        }
        else{
          $qtde = intval($qtde) - 1;
          $queryInserir = "UPDATE caminhoes SET modelo = '$modelo', montadora = '$montadora', 
          categoria = '$categoria', preco = '$preco', quantidade = '$qtde' WHERE modelo = '$modelo'";
          mysqli_query($conexao, $queryInserir);
        }

    }
   ?>
            <script src="../js/footer.js"></script>
  </body>

  </html>