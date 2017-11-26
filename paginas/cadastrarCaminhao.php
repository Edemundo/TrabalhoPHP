<?php
    session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastrar caminhões</title>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="icon" href="../images/titanis_blindagem.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    </head>

    <body>
        <script src="../js/header.js"></script>
        <div class="container">
            <br>
            <h2 class="subtitle level-item">Cadastrar Produtos</h2>
        </div>
        <ul id="mensagens-erro"></ul>
        <br>
        <br>
        <nav class="level">
            <div class="level-item">
                <form id="cadastro" method="post" action="cadastrarCaminhao.php">
                    <label class="label">Nome do modelo: </label>
                    <div class="control">
                        <input id="nome" class="input" type="text" placeholder="Modelo" name="modelo">
                    </div>

                    <label class="label">Nome da montadora: </label>
                    <div class="control">
                        <input id="montadora" class="input" type="text" placeholder="Montadora" name="montadora">
                    </div>
                    <label class="label">Categoria do caminhão: </label>
                    <div class="control">
                        <input id="categoria" class="input" type="text" placeholder="Categoria" name="categoria">
                    </div>
                    <label class="label">Preço do caminhão: </label>
                    <div class="control">
                        <input id="preco" class="input" type="text" placeholder="Preço" name="preco">
                    </div>
                    <label class="label">Quantidade do caminhão: </label>
                    <div class="control">
                        <input id="qtd" class="input" type="text" placeholder="Quantidade" name="qtd">
                    </div>
                    <label class="label">Imagem do caminhão: </label>
                    <div class="control">
                    <form action="cadastrarCaminhao.php" method="post" enctype="multipart/form-data">
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="img">
                            <span class="custom-file-control"></span>
                        </label>
                    </form>
                    <br>
                    <br>
                    <div class="field has-addons has-addons-centered">
                        <p class="control">
                            <button id="btnCadastro" class="button is-success" name="btnCadastroCaminhao">
                                Cadastrar
                            </button>
                        </p>
                    </div>
                    </div>

                </form>
            </div>
        </nav>
        <?php
      if(isset($_POST["btnCadastroCaminhao"])){
        include '../php/conexao.php';

        require_once '../php/conexao.php';	//inclui a conexao com o banco de dados


        $modelo = trim($_POST["modelo"]);
        $montadora = trim($_POST["montadora"]);
        $categoria = trim($_POST["categoria"]);
        $preco = trim($_POST["preco"]);
        $quantidade = trim($_POST["qtd"]);
        $img = trim($_POST["img"]);

        $modelo = mysqli_real_escape_string($conexao, $modelo);
        $montadora = mysqli_real_escape_string($conexao, $montadora);
        $categoria = mysqli_real_escape_string($conexao, $categoria);
        $preco = mysqli_real_escape_string($conexao, $preco);
        $quantidade = mysqli_real_escape_string($conexao, $quantidade);
        $img = mysqli_real_escape_string($conexao, $img);

        $queryVerificar = "SELECT * FROM caminhoes WHERE modelo = '$modelo'";
        $resultado = mysqli_query($conexao, $queryVerificar);
        $checar_resultado = mysqli_num_rows($resultado);

        if($checar_resultado > 0)
        {
          ?>
            <h2 class="subtitle level-item">Caminhão já está cadastrado</h2>
            <?php
        }
        else{
        ?>
                <h2 class="subtitle level-item">Cadastrado com sucesso!</h2>
                <?php
         $query = "INSERT INTO caminhoes (modelo, montadora, categoria, preco, quantidade, imagem)
                     VALUES ('$modelo', '$montadora', '$categoria', '$preco', '$quantidade', '$img ')";
         mysqli_query($conexao, $query);
        }
      }
    ?>

                    <script src="../js/footer.js"></script>
                    <script src="../js/cadastrarCaminhao.js"></script>
    </body>

    </html>