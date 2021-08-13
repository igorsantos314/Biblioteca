<?php
    require_once("../scripts/modelo/cliente.php");
    require_once("../scripts/modelo/livro.php");
    require_once("../scripts/modelo/clienteAlugaLivro.php");
    
    require_once("connection.php");

    class persistencia{

        public static persistencia $instance;

        public static function getInstance(){
            if(empty(self::$instance)){
                return self::$instance = new persistencia();
            }
            
            return self::$instance;
        }

        public function cadastrarCliente(cliente $cliente){
            $query = "INSERT INTO cliente 
            VALUES ('".$cliente->getCpf()."', '".$cliente->getNome()."', '".$cliente->getRg()."', '".$cliente->getDataNascimento()."', '".$cliente->getTelefone()."', '".$cliente->getCidade()."', '".$cliente->getBairro()."', '".$cliente->getRua()."', '".$cliente->getNumeroComplemento()."');";

            mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            print("<br>CLIENTE CADASTRADO !<br>");
        }

        public function cadastrarLivro(livro $livro){
            $query = "INSERT INTO livro 
            VALUES (".$livro->getCodigo().", '".$livro->getNome()."', '".$livro->getEstante()."', '".$livro->getPrateleira()."', ".$livro->getQuantidade().", ".$livro->getAno().", '".$livro->getAutor()."', '".$livro->getEditora()."', '".$livro->getGenero()."');";

            mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            print("<br>LIVRO CADASTRADO !<br>");
        }

        public function cadastrarAluguel(clienteAlugaLivro $aluguel){

            $query = "INSERT INTO cliente_aluga_livro(cpf_cliente, codigo_livro, data_aluguel)
            VALUES ('".$aluguel->getClienteAluguel()."', ".$aluguel->getLivroAluguel().", '".$aluguel->getDataAluguel()."');";

            mysqli_query(
                connection::getConnection(), 
                $query
            );

            print("<br> ALUGUEL CADASTRADO !<br>");
        }

        public function getClienteCpf($cpf){

        }
    }
?>