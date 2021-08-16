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
        }

        public function cadastrarLivro(livro $livro){
            $query = "INSERT INTO livro 
            VALUES ('".$livro->getCodigo()."', '".$livro->getNome()."', '".$livro->getEstante()."', '".$livro->getPrateleira()."', ".$livro->getQuantidade().", ".$livro->getAno().", '".$livro->getAutor()."', '".$livro->getEditora()."', '".$livro->getGenero()."');";

            mysqli_query(
                connection::getConnection(), 
                $query
            );
        }

        public function cadastrarAluguel(clienteAlugaLivro $aluguel){

            $query = "INSERT INTO cliente_aluga_livro(cpf_cliente, codigo_livro, data_aluguel, status, data_devolucao)
            VALUES ('".$aluguel->getClienteAluguel()."', ".$aluguel->getLivroAluguel().", '".$aluguel->getDataAluguel()."', '".$aluguel->getStatus()."', Null);";

            mysqli_query(
                connection::getConnection(), 
                $query
            );
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

        public function getClienteAlugaLivro($id){

            $query = "SELECT cal.id, c.cpf, c.nome, l.codigo_livro, l.nome_livro, cal.data_aluguel, cal.status, cal.data_devolucao 
            FROM livro l, cliente c, cliente_aluga_livro cal 
            WHERE l.codigo_livro=cal.codigo_livro and c.cpf=cal.cpf_cliente and cal.id=$id;";

            $aluguel = mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            while ($dados_aluguel = mysqli_fetch_assoc($aluguel)) {
                //RETORNA UM DICIONÁRIO DE DADOS DO ALUGUEL
                return $dados_aluguel;
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

        public function getQuantidadeEmprestimos()
        {
            $query = "select count(*) as quant from cliente_aluga_livro where status='PENDENTE'";

            $quant_livros = mysqli_query(
                connection::getConnection(), 
                $query
            );
            
            while ($quantidade = mysqli_fetch_assoc($quant_livros)) {
                //RETORNA QUANTIDADE DE LIVROS CADASTRADOS
                return $quantidade['quant'];
            }
        }

        public function existCliente($cpf){
            if($this->getCliente($cpf) == null){
                return false;
            }

            return true;
        }

        public function existLivro($codigo_livro){
            if($this->getLivro($codigo_livro) == null){
                return false;
            }
            
            return true;
        }

        public function existEmprestimo($idAluguel){
            $instanceAluguel = $this->getClienteAlugaLivro($idAluguel);

            if($instanceAluguel != null){
                if($instanceAluguel['status'] == 'PENDENTE')
                    return true;
            }
            
            return false;
        }
        
        public function updateStatusEmprestimo(clienteAlugaLivro $aluguel){
            $query = "UPDATE cliente_aluga_livro SET status='ENTREGUE', data_devolucao='".$aluguel->getDataDevolucao()."' WHERE id=".$aluguel->getId()."";
            
            mysqli_query(
                connection::getConnection(), 
                $query
            );
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