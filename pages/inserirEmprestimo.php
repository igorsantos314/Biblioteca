<?php
    include("../scripts/facade/conexao.php");
    
    if(persistencia::getInstance()->existCliente($_POST['cpfCliente']) and persistencia::getInstance()->existLivro($_POST['codigoLivro'])){
        conexao::getInstance()->salvarClienteAlugaLivro(
            $_POST['cpfCliente'],
            $_POST['codigoLivro'],
            $_POST['dataAluguel']
        );
    }
    else{
        print("CLIENTE OU LIVRO NÃO EXISTEM !");
    }
?>