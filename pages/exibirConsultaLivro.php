<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="icon" type="imagem/png" href="../assets/icon.png" />
    <title>Consulta de cliente</title>
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
        <strong>Consulta de cliente</strong>
        <div id="content_main">
            <table border="1">
                <?php
                    require_once('../scripts/persistencia/persistencia.php');

                    $dados_livro = persistencia::getInstance()->getLivro($_POST['codigo']);

                    if($dados_livro != null){
                        
                        $codigo_livro = $dados_livro['codigo_livro'];
                        $nome_livro = $dados_livro['nome_livro'];
                        $estante = $dados_livro['estante'];
                        $prateleira = $dados_livro['prateleira'];
                        $quantidade = $dados_livro['quantidade'];
                        $ano = $dados_livro['ano'];
                        $autor = $dados_livro['autor'];
                        $editora = $dados_livro['editora'];
                        $genero = $dados_livro['genero'];
                        
                        print("
                            <tr>
                                <th>CODIGO</th>
                                <th>$codigo_livro</th>
                            </tr>
                            
                            <tr>
                                <th>NOME</th>
                                <th>$nome_livro</th>
                            </tr>
                            
                            <tr>
                                <th>ESTANTE</th>
                                <th>$estante</th>
                            </tr>
                            
                            <tr>
                                <th>PRATELEIRA</th>
                                <th>$prateleira</th>
                            </tr>
                            
                            <tr>
                                <th>QUANTIDADE</th>
                                <th>$quantidade</th>
                            </tr>
                            
                            <tr>
                                <th>ANO</th>
                                <th>$ano</th>
                            </tr>
                            
                            <tr>
                                <th>AUTOR</th>
                                <th>$autor</th>
                            </tr>
                            
                            <tr>
                                <th>EDITORA</th>
                                <th>$genero</th>
                            </tr>

                            <tr>
                                <th>GENERO</th>
                                <th>$genero</th>
                            </tr>");
                    }
                    else{
                        print("LIVRO NÃO EXISTE !");
                    }
                ?>
            </table>
            
        </div>
    </main>
    </div>
    
</body>
</html>