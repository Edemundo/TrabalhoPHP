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
          <!-- um dos dois ^-v -- os dois problemas  -->
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
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
        <?php
      }
        ?>

          <script src="../js/footer.js"></script>
  </body>

  </html>