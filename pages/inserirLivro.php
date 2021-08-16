<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/cadastroForms.css">
    <link rel="icon" type="imagem/png" href="../assets/icon.png" />
    <title>Cadastro de livro</title>
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
        <strong>Cadastro de Livro</strong>
        <div id="content_main">
            <form action="cadastroLivro.html">
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
                print("<label>LIVRO CADASTRADO !</label>");
            ?>
            <br>
            <button type="submit">Voltar</button>
            </form>
        </div>
    </main>
    </div>
    
</body>
</html>