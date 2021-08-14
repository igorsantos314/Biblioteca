<?php

      include("../scripts/facade/conexao.php");
      
      function encontrouNumeros($string) {
            return (filter_var($string, FILTER_SANITIZE_NUMBER_INT) === '' ? false : true);
      }
      
      #PEGAR CAMPOS
      $nome = strtoupper($_POST["nameCliente"]);
      $cpf = $_POST["cpfCliente"];
      $rg = $_POST["rgCliente"];
      $data_nascimento = $_POST["nascimentoCliente"];
      $telefone = $_POST["telefoneCliente"];
      $cidade = strtoupper($_POST["cidadeCliente"]);
      $bairro = strtoupper($_POST["bairroCliente"]);
      $rua = strtoupper($_POST["ruaCliente"]);
      $n_complemento = strtoupper($_POST["numComplementoCliente"]);
      
      conexao::getInstance()->salvarCliente($cpf, $nome, $rg, '2021-08-09', $telefone, $cidade, $bairro, $rua, $n_complemento);
      
      header("location:cadastroCliente.html");
?>