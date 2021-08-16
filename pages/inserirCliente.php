<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/cadastroForms.css">
    <link rel="icon" type="imagem/png" href="../assets/icon.png" />
    <title>Cadastro de cliente</title>
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
        <strong>Cadastro de cliente</strong>
        <div id="content_main">
            
            <form action="cadastroCliente.html" method="POST">
                <fieldset>
                    <?php

                        include("../scripts/facade/conexao.php");

                        function encontrouNumeros($string) {
                            return (filter_var($string, FILTER_SANITIZE_NUMBER_INT) === '' ? false : true);
                        }

                        conexao::getInstance()->salvarCliente(
                            $_POST["cpfCliente"], 
                            strtoupper($_POST["nameCliente"]), 
                            $_POST["rgCliente"], 
                            '2021-08-09', 
                            $_POST["telefoneCliente"], 
                            strtoupper($_POST["cidadeCliente"]), 
                            strtoupper($_POST["bairroCliente"]),
                            strtoupper($_POST["ruaCliente"]),
                            strtoupper($_POST["numComplementoCliente"])
                        );

                        print("<label>CLIENTE CADASTRADO !</label>
                            <br>");
                    ?>
                
                </fieldset>

                <button type="submit">Voltar</button>
            </form>
            
        </div>
    </main>
    </div>
    <script src="../scripts/cadastroCliente.js"></script>
</body>
</html>
