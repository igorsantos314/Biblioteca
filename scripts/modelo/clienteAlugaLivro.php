<?php
    require_once("cliente.php");
    require_once("livro.php");
    
    /**
     * Entidade ClienteAlugaLivro - 
     * Uma instância dessa classe armazena um cliente, um livro e a data do aluguel do livro
     * 
     * @copyright 2021, Igor Santos, Gabriel Vasconcelos, Rafaella Weiss, Everton Lima
     */
    class clienteAlugaLivro{
        
        /** @var cliente Instância de Cliente */
        private cliente $cliente;

        /** @var livro Instância de Livro */
        private livro $livro;

        /** @var string Data do Aluguel do Livro */
        private $dataAluguel; // FORMATO AAAA/MM/DD
        
        /** @var string Status do Livro PENDENTE ou ENTREGUE */
        private $status; // FORMATO AAAA/MM/DD

        /** @var string Data de Devolução do Livro */
        private $dataDevolucao; // FORMATO AAAA/MM/DD

        /**
         * Construtor da Classe clienteAlugaLivro
         * @param cliente $cliente Instancia do Cliente
         * @param livro $livro Instância do alugado Livro
         * @param string $cliente Data do Aluguel do Livro
         */
        public function __construct(cliente $cliente, livro $livro, $dataAluguel, $status='PENDENTE', $dataDevolucao=null)
        {
            $this->cliente = $cliente;
            $this->livro = $livro;
            $this->dataAluguel = $dataAluguel;
            $this->status = $status;
            $this->dataDevolucao = $dataDevolucao;
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

        public function getStatus(){
            return $this->status;
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