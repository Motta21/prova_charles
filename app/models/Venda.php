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

        public function salvarVenda($id_produto, $quantidade) {
            $this->conexao->beginTransaction();
            try {
                $sqlProduto = "SELECT VALOR, ESTOQUE FROM produtos WHERE ID_PROD = :id";
                $stmtProduto = $this->conexao->prepare($sqlProduto);
                $stmtProduto->execute([':id' => $id_produto]);
                $produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

                if (!$produto || $produto['ESTOQUE'] < $quantidade) {
                    $this->conexao->rollBack();
                    return false;
                }

                //
                $valor_total = $produto['VALOR'] * $quantidade;
                //

                $sqlEstoque = "UPDATE produtos SET ESTOQUE = ESTOQUE - :qtd WHERE ID_PROD = :id";
                $stmtEstoque = $this->conexao->prepare($sqlEstoque);
                $stmtEstoque->execute([
                    ':qtd' => $quantidade,
                    ':id' => $id_produto
                ]);

                //

                $sqlVenda = "INSERT INTO vendas (ID_PROD, QUANTIDADE, VALOR_TOTAL, DATA_VENDA) VALUES (:id_prod, :qtd, :total, NOW())";
                $stmtVenda = $this->conexao->prepare($sqlVenda);
                $stmtVenda->execute([
                    ':id_prod' => $id_produto,
                    ':qtd' => $quantidade,
                    ':total' => $valor_total
                ]);

                $this->conexao->commit();
                return true;
            } catch (PDOException $e) {
                $this->conexao->rollBack();
                error_log("Erro ao salvar venda: " . $e->getMessage());
                return false;
            }
        }
    }
?>