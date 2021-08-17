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
        <strong>Consulta de Emprestimo de Livro</strong>
        <div id="content_main">
            <form action="consultaEmprestimo.html">
                <fieldset>
                    <table border="1">
                        <?php
                            require_once('../scripts/persistencia/persistencia.php');

                            $aluguel = persistencia::getInstance()->getClienteAlugaLivro($_POST['id_aluguel']);
                            
                            if($aluguel != null){
                                
                                print("
                                    <tr>
                                        <th>CODIGO</th>
                                        <th>".$aluguel->getId()."</th>
                                    </tr>

                                    <tr>
                                        <th>CPF DO CLIENTE</th>
                                        <th>".$aluguel->getClienteAluguel()->getCpf()."</th>
                                    </tr>

                                    <tr>
                                        <th>NOME DO CLIENTE</th>
                                        <th>".$aluguel->getClienteAluguel()->getNome()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>CODIGO DO LIVRO</th>
                                        <th>".$aluguel->getLivroAluguel()->getCodigo()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>NOME DO LIVRO</th>
                                        <th>".$aluguel->getLivroAluguel()->getNome()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>DATA DO ALUGUEL</th>
                                        <th>".$aluguel->getDataAluguel()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>STATUS</th>
                                        <th>".$aluguel->getStatus()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>DATA DE DEVOLUÇÃO</th>
                                        <th>".$aluguel->getDataDevolucao()."</th>
                                    </tr>
                                    
                                    <tr>
                                        <th>
                                            <button>EDITAR</button>
                                            <button>DELETAR</button>
                                        </th>
                                        
                                    </tr>");
                            }
                            else{
                                print("EMPRESTIMO NÃO ENCONTRADO !");
                            }
                        ?>
                    </table>
                    <button type="submit">Voltar</button>
                </fieldset>
            </form>
        </div>
    </main>
    </div>
    
</body>
</html>