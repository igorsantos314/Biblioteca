<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="icon" type="imagem/png" href="../assets/icon.png" />
    <title>Devolu&ccedil;&atilde;o de livros</title>
</head>
    <header>
        <nav>
            <ul id="menu">
                <li id="logo">BeloBiblio</li>
                <li><a href="home.php" id="home">Home</a></li>
                <li><a href="" id="exit">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div id="content">
        <aside>
            <img src="../assets/avatar.svg" id="perfil" alt="Foto de perfil">
            <a href="cadastroCliente.html" id="optionsBtn">Cadastrar cliente</a>
            <a href="consultaCliente.html" id="optionsBtn">Consultar cliente</a>
            <a href="cadastroLivro.html" id="optionsBtn">Cadastrar livro</a>
            <a href="consultaLivro.html" id="optionsBtn">Consultar livro</a>
            <a href="cadastroEmprestimo.html" id="optionsBtn">Cadastrar empr&eacute;stimo</a>
            <a href="consultaEmprestimo.html" id="optionsBtn">Consultar empr&eacute;stimo</a>
            <a href="devolucaoLivros.html" id="optionsBtn">Devolu&ccedil;&atilde;o de livros</a>
        </aside>
        
    <main>
        <strong>Devolu&ccedil;&atilde;o de livros</strong>
        <?php
            require_once("../scripts/facade/conexao.php");

            if (persistencia::getInstance()->existEmprestimo($_POST['idAluguel'])){
                conexao::getInstance()->salvarEntregaLivro(
                    $_POST['idAluguel'],
                    $_POST['dataDevolucao']
                );
                print("LIVRO ENTREGUE !");
            }
            else{
                print('EMPRESTIMO NÃO EXISTE OU JÁ FOI ENTREGUE!');
            }
        ?>
        <form action="devolucaoLivros.html">
            <input type="submit" value="voltar">
        </form>
    </main>
    </div>
</body>
</html>

