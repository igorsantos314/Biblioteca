<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #fafafa;
    }

    .row {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .card {
        border-radius: 5px;
        box-shadow: 7px 7px 13px 0px rgba(50, 50, 50, 0.22);
        padding: 30px;
        margin: 20px;
        width: 400px;
        transition: all 0.3s ease-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }

    .card p {
        color: #a3a5ae;
        font-size: 16px;
    }

    .image {
        float: right;
        max-width: 64px;
        max-height: 64px;
    }

    .blue {
        border-left: 3px solid #4895ff;
    }

    .green {
        border-left: 3px solid #3bb54a;
    }

    .red {
        border-left: 3px solid #b3404a;
    }
</style>

<body>

    <div class="row">

        <div class="row">
            
            <?php
                $connect = mysqli_connect("localhost", "root", "", "database");
                $clientes = mysqli_query($connect, "select * from cliente where ;");
                
                $colors = array("blue", "green", "red");
                
                while ($c = mysqli_fetch_assoc($clientes)) {
                    $nome = $c["nome"];
                    $cpf = $c["cpf"];
                    $rg = $c["rg"];
                    $data_nascimento = $c["data_nascimento"];
                    $telefone = $c["telefone"];
                    $cidade = $c["cidade"];
                    $bairro = $c["bairro"];
                    $rua = $c["rua"];
                    $n_complemento = $c["numero_complemento"];
                    
                    print(" <div class='card green'>
                                <STRONG>$nome</STRONG>
                                <p>CPF:$cpf  RG:$rg</p>
                                <p>DATA DE NASCIMENTO:$data_nascimento</p>
                                <p>TELEFONE:$telefone</p>
                                <p>CIDADE:$cidade<br> BAIRRO:$bairro<br> RUA:$rua<br> N/COMPLEMENTO:$n_complemento<br></p>
                            </div>");
                }
            ?>
            
        </div>

</body>

</html>