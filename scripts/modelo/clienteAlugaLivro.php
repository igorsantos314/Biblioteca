<?php
    require_once("cliente.php");
    require_once("livro.php");
    
    class clienteAlugaLivro{
        
        private cliente $cliente;
        private livro $livro;
        private $dataAluguel; // FORMATO AAAA/MM/DD
        
        public function __construct(cliente $cliente, livro $livro, $dataAluguel)
        {
            $this->cliente = $cliente;
            $this->livro = $livro;
            $this->dataAluguel = $dataAluguel;
        }
        
        public function getClienteAluguel(){
            return $this->cliente->getCpf();
        }

        public function getLivroAluguel(){
            return $this->livro->getCodigo();
        }

        public function getDataAluguel(){
            return $this->dataAluguel;
        }
    }

    //$c1 = new cliente('123.654.965-50');
    /*$l1 = new livro(789);
    $data_aluguel = '07/08/2021';

    $cal = new clienteAlugaLivro($c1, $l1, $data_aluguel);

    print("
        DADOS DO ALUGUEL: 
        <br>
        <br>
        CLIENTE CPF: ".$cal->getClienteAluguel()."
        <br>
        LIVRO NUMERO: ".$cal->getLivroAluguel()."
        <br>
        DATA DO ALUGUEL: ".$cal->getDataAluguel()."
        <br>
    ");*/
?>