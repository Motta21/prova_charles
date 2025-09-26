<?php
    class Produto {
        public $id_prod;
        public $nome;
        public $valor;
        public $estoque;

        private $conexao;

        public function __construct($pdo) {
            $this->conexao = $pdo;
        }

        public function listarProdutos() {

        }

        public function buscarPorId($id) {

        }

        public function buscarPorNome($nome) {

        }

        public function salvar(){

        }

        public function calcularValorFinal($quantidade) {
            
        }
    }
?>