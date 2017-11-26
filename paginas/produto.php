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
    $quantidade = mysqli_num_rows($queryConsulta);
    $resultado = mysqli_query($conexao, $queryConsulta);
    $row = mysqli_fetch_assoc($resultado);
      for($i = 0; $i < $quantidade; $i++)
      {
        ?>
          <div class="col-sm-6">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src=<?php $row['imagem']?> alt=<?php $row['modelo']?>>
              <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
            </div>
          </div>
        <?php
        
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
  <script src="../js/footer.js"></script>
</body>

</html>