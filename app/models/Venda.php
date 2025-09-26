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
            $this->conexao = $pdo;
        }

        public function registrar($id_produto, $quantidade) {

        }

        public function listarVendas() {
            try {
                $sql = "SELECT * FROM vendas";
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao listar vendas: " . $e->getMessage());
            }
        }

        public function buscarVendaId($id) {
            try {
                $sql = "SELECT * FROM vendas WHERE ID_VENDAS = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute([$id_venda]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao buscar a venda no ID: " . $e->getMessage());
            }
        }
    }
?>