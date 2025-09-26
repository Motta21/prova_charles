<?php
    class ProdutoController {
        public function listar() {
            require_once __DIR__ . '/../models/Produto.php';

            $pdo = require_once __DIR__ . '/../../config/database.php';

            $produtoModel = new Produto($pdo);
            $listaProdutos = $produtoModel->listarProdutos();

            require_once __DIR__ . '/../views/produtos/listar.php';
        }

        public function criar() {
            // Apenas carrega a view do formulário
            require_once __DIR__ '/../views/produtos/formulario.php';
        }

        public function salvar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Se os dados foram enviados via POST
                $nome = $_POST['nome'] ?? '';
                $valor = $_POST['valor'] ?? 0;
                $estoque = $_POST['estoque'] ?? 0;

                // Validação
                if (empty($name) || $valor <= 0) {
                    echo "Nome e valor são obrigatórios!";
                    return;
                }

                $pdo = require_once __DIR__ . '/../../config/database.php';
                require_once __DIR__ . '/../models/Produto.php';
                $produtoModel = new Produto($pdo);

                $sucesso = $produtoModel->salvarProduto($nome, $valor, $estoque);
                if($sucesso) {
                    header('Location: /index.php?acao=Listar');
                    exit();
                } else {
                    echo "Não foi possível cadastrar o produto";
                }
            } else {
                header('Location: /index.php');
                exit();
            }
        }
    }
?>