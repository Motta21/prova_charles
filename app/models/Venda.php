<?php
    require_once __DIR__ . '/Produto.php';

    class Venda {
        public $id_venda;
        public $id_produto;
        public $quantidade;
        public $valor_total;
        public $data_venda;

        private $conexao;

        public function __construct($pdo) {

        }

        public function registrar($id_produto, $quantidade) {
            
        }
    }
?>