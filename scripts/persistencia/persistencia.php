<?php
    require_once("../scripts/modelo/cliente.php");
    require_once("../scripts/modelo/livro.php");
    require_once("../scripts/modelo/clienteAlugaLivro.php");
    
    //require_once("../modelo/cliente.php");
    //require_once("../modelo/livro.php");
    //require_once("../modelo/clienteAlugaLivro.php");
    
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
            VALUES ('".$livro->getCodigo()."', '".$livro->getNome()."', '".$livro->getEstante()."', '".$livro->getPrateleira()."', ".$livro->getQuantidade().", ".$livro->getAno().", '".$livro->getAutor()."', '".$livro->getEditora()."', '".$livro->getGenero()."');";

            print($query);

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

        public function getCliente($cpf){

            $query = "select * from cliente where cpf='$cpf'";

            $cliente = mysqli_query(
                connection::getConnection(), 
                $query
            );

            while ($dados_cliente = mysqli_fetch_assoc($cliente)) {
                //RETORNA UM DICIONÁRIO DE DADOS DO CLIENTES
                return $dados_cliente;
            }
        }

        public function getLivro($codigo){

            $query = "select * from livro where codigo_livro=$codigo;";

            $livro = mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            while ($dados_livro = mysqli_fetch_assoc($livro)) {
                //RETORNA UM DICIONÁRIO DE DADOS DO LIVRO
                return $dados_livro;
            }
        }

        public function deleteCliente($cpf){
            $query = "delete from cliente where cpf='$cpf';";

            mysqli_query(
                connection::getConnection(), 
                $query
            );
        }

        public function deleteLivro($codigo){
            $query = "delete from livro where codigo_livro=$codigo;";
            print($query);
            
            $result = mysqli_query(
                connection::getConnection(), 
                $query
            );

            print($result);
        }

        public function getQuantidadeClientes()
        {
            $query = "select count(*) as quant from cliente";

            $quant_clientes = mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            while ($quantidade = mysqli_fetch_assoc($quant_clientes)) {
                //RETORNA QUANTIDADE DE CLIENTES CADASTRADOS
                return $quantidade['quant'];
            }
        }

        public function getQuantidadeLivros()
        {
            $query = "select count(*) as quant from livro";

            $quant_livros = mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            while ($quantidade = mysqli_fetch_assoc($quant_livros)) {
                //RETORNA QUANTIDADE DE LIVROS CADASTRADOS
                return $quantidade['quant'];
            }
        }
    }

    //print(persistencia::getInstance()->getCliente('999')['telefone']);
    //persistencia::getInstance()->deleteCliente('3030');
    //persistencia::getInstance()->deleteLivro('10');
    /*print(
        persistencia::getInstance()->getQuantidadeClientes()
    );
    print(
        persistencia::getInstance()->getQuantidadeLivros()
        );*/
?>