<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <form id="cadastro" method="post" action="cadastroCaminhao.php">
                <label class="label">Nome do modelo: </label>
                <div class="control">
                    <input id="nome" class="input" type="text" placeholder="Modelo">
                </div>

                <label class="label">Nome da montadora: </label>
                <div class="control">
                    <input id="montadora" class="input" type="text" placeholder="Montadora">
                </div>
                <label class="label">Categoria do caminhão: </label>
                <div class="control">
                    <input id="categoria" class="input" type="text" placeholder="Categoria">
                </div>
                <label class="label">Preço do caminhão: </label>
                <div class="control">
                    <input id="preco" class="input" type="text" placeholder="Preço">
                </div>
                <br>
                <div class="field has-addons has-addons-centered">
                    <p class="control">
                        <button id="btnCadastro" class="button is-success" name="btnCadastro">
                            Cadastrar
                        </button>
                    </p>
                </div>

            </form>
        </div>
    </nav>

    <script src="../js/footer.js"></script>
    <script src="../js/cadastrarCaminhao.js"></script>
</body>

</html>