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
        <strong>Consulta de Livro</strong>
        <div id="content_main">
            <table border="1">
                <?php
                    require_once('../scripts/persistencia/persistencia.php');
                    
                    $livro = persistencia::getInstance()->getLivro($_POST['codigo']);
                    
                    if($livro != null){
                        
                        print("
                            <tr>
                                <th>CODIGO</th>
                                <th>".$livro->getCodigo()."</th>
                            </tr>
                            
                            <tr>
                                <th>NOME</th>
                                <th>".$livro->getNome()."</th>
                            </tr>
                            
                            <tr>
                                <th>ESTANTE</th>
                                <th>".$livro->getEstante()."</th>
                            </tr>
                            
                            <tr>
                                <th>PRATELEIRA</th>
                                <th>".$livro->getPrateleira()."</th>
                            </tr>
                            
                            <tr>
                                <th>QUANTIDADE</th>
                                <th>".$livro->getQuantidade()."</th>
                            </tr>
                            
                            <tr>
                                <th>ANO</th>
                                <th>".$livro->getAno()."</th>
                            </tr>
                            
                            <tr>
                                <th>AUTOR</th>
                                <th>".$livro->getAutor()."</th>
                            </tr>
                            
                            <tr>
                                <th>EDITORA</th>
                                <th>".$livro->getEditora()."</th>
                            </tr>

                            <tr>
                                <th>GENERO</th>
                                <th>".$livro->getGenero()."</th>
                            </tr>
                            
                            <tr>
                                <th>
                                    <button>EDITAR</button>
                                    <button>DELETAR</button>
                                </th>
                                
                            </tr>");
                    }
                    else{
                        print("LIVRO NÃO EXISTE !");
                    }
                ?>
            </table>
            <strong>
                <form action="consultaLivro.html">
                    <button type="submit">Voltar</button>
                </form>
            </strong>
            
        </div>
    </main>
    </div>
    
</body>
</html>