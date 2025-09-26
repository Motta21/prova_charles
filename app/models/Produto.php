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
            try {
                $sql = "SELECT * FROM produtos";
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao listar produtos: " . $e->getMessage());
            }
        }

        public function buscarPorId($id) {          
            try {
                $sql = "SELECT * FROM produtos WHERE ID_PROD = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute([$id_prod]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao buscar o produto: " . $e->getMessage());
            }
            }
        }

        public function buscarPorNome($nome) {
            try {
                $sql = "SELECT * FROM produtos WHERE NOME = ?";
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute([$nome]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao buscar o produto: " . $e->getMessage());
            }
        }

        public function salvarProduto(){
            try {
                $sql = "INSERT INTO produtos (NOME, VALOR, ESTOQUE) VALUES (:nome, :valor, :estoque)";
                $stmt = $this->conexao->prepare($sql);

                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':valor', $valor);
                $stmt->bindValue(':estoque', $estoque);

                return $stmt->execute();
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erro ao salvar produto: " . e->getMessage());
                return false;
            }
        }

        public function calcularValorFinal($quantidade) {
            
        }
?>