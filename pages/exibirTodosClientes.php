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
            
                <?php
                    require_once('../scripts/persistencia/persistencia.php');

                    $clientes = persistencia::getInstance()->getTodosClientes();

                    if($clientes != null){
                        
                        foreach($clientes as $cliente){
                            print("
                            <table border='1'>
                                <tr>
                                    <th>CPF</th>
                                    <th>".$cliente->getCpf()."</th>
                                </tr>
                                
                                <tr>
                                    <th>NOME</th>
                                    <th>".$cliente->getNome()."</th>
                                </tr>
                                
                                <tr>
                                    <th>RG</th>
                                    <th>".$cliente->getRg()."</th>
                                </tr>
                                
                                <tr>
                                    <th>DATA DE NASCIMENTO</th>
                                    <th>".$cliente->getDataNascimento()."</th>
                                </tr>
                                
                                <tr>
                                    <th>TELEFONE</th>
                                    <th>".$cliente->getTelefone()."</th>
                                </tr>
                                
                                <tr>
                                    <th>CIDADE</th>
                                    <th>".$cliente->getCidade()."</th>
                                </tr>
                                
                                <tr>
                                    <th>BAIRRO</th>
                                    <th>".$cliente->getBairro()."</th>
                                </tr>
                                
                                <tr>
                                    <th>RUA</th>
                                    <th>".$cliente->getRua()."</th>
                                </tr>
                                
                                <tr>
                                    <th>NUMERO/COMPLEMENTO</th>
                                    <th>".$cliente->getNumeroComplemento()."</th>
                                </tr>
                            </table>
                            <br>");
                            
                        }
                        
                    }
                    else{
                        print("NENHUM CLIENTE CADASTRADO !");
                    }
                ?>
            <form action="consultaCliente.html">
                <input type="submit" value="Voltar">
            </form>
        </div>
    </main>
    </div>
    
</body>
</html>