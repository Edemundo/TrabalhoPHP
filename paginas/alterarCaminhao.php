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
                    <br>
                    <div class="field has-addons has-addons-centered">
                        <p class="control">
                            <button id="btnCadastro" class="button is-success" name="btnCadastroCaminhao">
                                Cadastrar
                            </button>
                        </p>
                    </div>

                </form>
            </div>
        </nav>
        <script src="../js/footer.js"></script>
        <script src="../js/entrar.js"></script>
    </article>
    <?php
        if(isset($_POST["btnCadastroCaminhao"])){
        include '../php/conexao.php';

        require_once '../php/conexao.php';	//inclui a conexao com o banco de dados


        $modelo = trim($_POST["modelo"]);
        $montadora = trim($_POST["montadora"]);
        $categoria = trim($_POST["categoria"]);
        $preco = trim($_POST["preco"]);
        $quantidade = trim($_POST["qtd"]);

        $mondelo = mysqli_real_escape_string($conexao, $modelo);
        $montadora = mysqli_real_escape_string($conexao, $montadora);
        $categoria = mysqli_real_escape_string($conexao, $categoria);
        $preco = mysqli_real_escape_string($conexao, $preco);
        $quantidade = mysqli_real_escape_string($conexao, $quantidade);

        $queryVerificar = "SELECT * FROM caminhoes WHERE modelo = '$modelo'";
        $resultado = mysqli_query($conexao, $queryVerificar);
        $checarResultado = mysqli_num_rows($resultado);

        if($checarResultado < 1)
        {
    ?>
            <h2 class="subtitle level-item">Caminhão não cadastrado!</h2>
            <?php
        }
        else
        {
            $queryQtde = "SELECT quantidade FROM caminhoes WHERE modelo = '$modelo'";
            mysqli_query($conexao, $queryQtde);
            $resultado = mysqli_query($conexao, $queryQtde);
            $row = mysqli_fetch_assoc($resultado);
            $qtde = $row['quantidade'];
            $qtde = intval($qtde) + intval($quantidade);

            $queryInserir = "UPDATE caminhoes SET modelo = '$modelo', montadora = '$montadora', 
                categoria = '$categoria', preco = '$preco', quantidade = '$qtde' WHERE modelo = '$modelo'";
            mysqli_query($conexao, $queryInserir);
        }
    }
        ?>
</body>
</html>