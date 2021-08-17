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
                                <tr align='left'>
                                    <td colspan='3'>
                                        
                                        ".$cliente->getNome()."
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='3'>
                                        <b>INFORMAÇÕES PESSOAIS</b> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        CPF: ".$cliente->getCpf()."
                                    </td>
                                    <td>
                                        RG: ".$cliente->getRg()."
                                    </td>
                                    <td>
                                        DATA DE NASCIMENTO: ".$cliente->getDataNascimento()."
                                    </td>
                                </tr>
                                </tr>
                                
                                <tr>
                                    <td colspan='3'>
                                        <b>ENDEREÇO</b>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan='3'>
                                        CIDADE: ".$cliente->getCidade()."
                                    </td> 
                                </tr>    

                                <tr>
                                    <td colspan='3'>
                                        BAIRRO: ".$cliente->getBairro()."
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan='3'>
                                        RUA: ".$cliente->getRua()."
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan='3'>
                                        COMPLEMENTO: ".$cliente->getNumeroComplemento()."
                                    </td>
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