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

                    $dados_cliente = persistencia::getInstance()->getCliente($_POST['cpf']);

                    if($dados_cliente != null){
                        
                        $nome = $dados_cliente['nome'];
                        $rg = $dados_cliente['rg'];
                        $data_nascimento = $dados_cliente['data_nascimento'];
                        $telefone = $dados_cliente['telefone'];
                        $cidade = $dados_cliente['cidade'];
                        $bairro = $dados_cliente['bairro'];
                        $rua = $dados_cliente['rua'];
                        $numero_complemento = $dados_cliente['numero_complemento'];

                        print("
                            <tr>
                                <th>NOME</th>
                                <th>$nome</th>
                            </tr>
                            
                            <tr>
                                <th>RG</th>
                                <th>$rg</th>
                            </tr>
                            
                            <tr>
                                <th>DATA DE NASCIMENTO</th>
                                <th>$data_nascimento</th>
                            </tr>
                            
                            <tr>
                                <th>TELEFONE</th>
                                <th>$telefone</th>
                            </tr>
                            
                            <tr>
                                <th>CIDADE</th>
                                <th>$cidade</th>
                            </tr>
                            
                            <tr>
                                <th>BAIRRO</th>
                                <th>$bairro</th>
                            </tr>
                            
                            <tr>
                                <th>RUA</th>
                                <th>$rua</th>
                            </tr>
                            
                            <tr>
                                <th>NUMERO/COMPLEMENTO</th>
                                <th>$numero_complemento</th>
                            </tr>
                            
                            <tr>
                                <th>
                                    <button>EDITAR</button>
                                    <button>DELETAR</button>
                                </th>
                            </tr>");
                    }
                    else{
                        print("CLIENTE NÃO EXISTE !");
                    }
                ?>
            </table>
            
            <form action="consultaCliente.html">
                <input type="submit" value="Voltar">
            </form>
        </div>
    </main>
    </div>
    
</body>
</html>