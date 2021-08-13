<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nome do Cliente</td>
            <td>Cpf</td>
            <td>RG</td>
            <td>Data de Nascimento</td>
            <td>Telefone</td>
            <td>Cidade</td>
            <td>Bairro</td>
            <td>Rua</td>
            <td>N°/Complemento</td>
        </tr>

        <?php
            $connect = mysqli_connect("localhost", "root", "", "database");
            $clientes = mysqli_query($connect, "select * from cliente;");
            
            while($c= mysqli_fetch_assoc($clientes)){
                $nome = $c["nome"];
                $cpf = $c["cpf"];
                $rg = $c["rg"];
                $data_nascimento = $c["data_nascimento"];
                $telefone = $c["telefone"];
                $cidade = $c["cidade"];
                $bairro = $c["bairro"];
                $rua = $c["rua"];
                $n_complemento = $c["numero_complemento"];

                print(" <tr>
                            <td>$nome</td>
                            <td>$cpf</td>
                            <td>$rg</td>
                            <td>$data_nascimento</td>
                            <td>$telefone</td>
                            <td>$cidade</td>
                            <td>$bairro</td>
                            <td>$rua</td>
                            <td>$n_complemento</td>
                        </tr>");
            }
        ?>

    </table>
    
</body>
</html>