<?php
    require_once("../scripts/persistencia/persistencia.php");
    
    /**
     * Entidade Conexao - 
     * Conexão entre a lógica de negócio e a persistência
     * 
     * @copyright 2021, Igor Santos, Gabriel Vasconcelos, Rafaella Weiss, Everton Lima
     */
    class conexao{

        /** @var conexao Instância da Classe Conexão*/
        public static conexao $instance;
        
        /**
         * @return conexao Retorna uma instância de Conexao
         */
        public static function getInstance(){
            if(empty(self::$instance)){
                return self::$instance = new conexao();
            }

            return self::$instance;
        }
        
        /**
         * Recebe os parametros e envia o objeto Cliente para a persistência
         * @param string $cpf CPF do cliente
         * @param string $nome Nome do cliente
         * @param string $rg RG do cliente
         * @param string $data_nascimento Data de Nascimento do cliente
         * @param string $telefone Telefone do cliente
         * @param string $cidade Cidade do cliente
         * @param string $bairro Bairro do cliente
         * @param string $rua Rua do cliente
         * @param string $numero_complemento Número ou Complemento do Endereço do cliente
         */
        public function salvarCliente($nome, $cpf, $rg, $data_nascimento, $telefone, $cidade, $bairro, $rua, $numero_complemento){
            //ENVIA UM OBJETO DE CLIENTE PARA CADASTRAR NO BANCO DE DADOS
            persistencia::getInstance()->cadastrarCliente(
                new cliente($nome, $cpf, $rg, $data_nascimento, $telefone, $cidade, $bairro, $rua, $numero_complemento)
            );
        }
        
        /**
         * Recebe os parâmetros e envia o objeto Livro para a persistência
         * @param int $codigo Código do Livro
         * @param string $nome Nome do Livro
         * @param string $estante Estante do Livro
         * @param string $prateleira Prateleira do Livro
         * @param int $quantidade Quantidade disponível do Livro
         * @param int $ano Ano de Publicação do Livro
         * @param string $autor Autor do Livro
         * @param string $editora Editora que publicou do Livro
         * @param string $genero Gênero do Livro
         */
        public function salvarLivro($nome, $codigo, $estante, $prateleira, $quantidade, $ano, $autor, $editora, $genero){
            persistencia::getInstance()->cadastrarLivro(
                new livro($nome, $codigo, $estante, $prateleira, $quantidade, $ano, $autor, $editora, $genero)
            );
        }
        
        /**
         * Recebe os parâmetros e envia o objeto ClienteAlugaLivro para a persistência
         * @param string $cpfCliente CPF do Cliente que está alugando o livro
         * @param string $codigoLivro Código do Livro que está sendo alugado
         * @param string $dataAluguel Data que foi efetuada a locação do livro
         */
        public function salvarClienteAlugaLivro($cpfCliente, $codigoLivro, $dataAluguel){
            
            persistencia::getInstance()->cadastrarAluguel(
                new clienteAlugaLivro(new cliente($cpfCliente), new livro($codigoLivro), $dataAluguel)
            );
        }

        public function salvarEntregaLivro($id, $dataDevolucao){
            $instanceAluguel = new clienteAlugaLivro(
                new cliente(),
                new livro()
            );
            
            $instanceAluguel->setId($id);
            $instanceAluguel->setDataDevolucao($dataDevolucao);
            $instanceAluguel->setStatus('Entregue');

            persistencia::getInstance()->updateStatusEmprestimo(
                $instanceAluguel
            );
        }
    }
    
    //conexao::getInstance()->salvarLivro(11, 'Primo Rico', 'MEIO', '5', 10, 2020, 'Thiago', '', 'Finanças');
    //conexao::getInstance()->salvarCliente('123.654.965-50', 'Rafela', '10', '02/09/1999', '10', 'BJ', 'AG', 'TRAV', '09');
    
    /*$c1 = new cliente('123.654.965-50');
    $l1 = new livro(10);
    $data_aluguel = '2021-08-07';

    conexao::getInstance()->salvarClienteAlugaLivro(
        $c1,
        $l1,
        $data_aluguel
    );*/
?>