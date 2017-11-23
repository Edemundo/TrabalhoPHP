<?php
    $email = $_POST["eemail"];
    $senha = $_POST["senha"];

    // md5($senha,)
    
    $conexao = mysqli_connect('localhost', 'root', '', 'projetocaminhao');
    $query = "insert into clientes (email, senha) values ('{$email}', '{$senha})";
    
    if(mysqli_query($conexao, $query)) {
    ?>
        <p id="sucesso">Sucesso</p>
    <?php
    } else {
    ?>
    <p id="sucesso"> Não foi possível cadastrar</p>
     <?php echo($query)?> 
    <?php
    }
    mysqli_close($conexao);   
?>