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
      
      header("location:cadastroCliente.html");
?>