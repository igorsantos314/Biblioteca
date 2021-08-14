<?php
    include("../scripts/facade/conexao.php");

    conexao::getInstance()->salvarLivro(
        $_POST['cod'],
        strtoupper($_POST['nome']),
        $_POST['estante'],
        $_POST['prateleira'],
        $_POST['qtd'],
        $_POST['ano'],
        $_POST['autor'],
        $_POST['editora'],
        $_POST['genero']
    );

    header("location:cadastroLivro.html");
?>