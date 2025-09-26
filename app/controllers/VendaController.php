<?php
    class VendaController {
        public function listar() {
            require_once __DIR__ . '/../models/Venda.php';

            $pdo = require_once __DIR__ . '/../../config/database.php';

            $vendaModel = new Venda($pdo);
            $listaVendas = $vendaModel->listarVendas();

            require_once __DIR__ . '/../views/produtos/listar.php';
        }

        public function criar() {
            require_once __DIR__ '/../views/vendas/formulario.php';
        }

        public function salvar() {
            require_once __DIR__ . '/../models/Venda.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_produto = $_POST['id_produto'] ?? null;
                $quantidade = $_POST['quantidade'] ?? null;

                if (!$id_produto || !$quantidade || !is_numeric($id_produto) || id_numeric($quantidade) || $quantidade <= 0) {
                    header('Location: /index.php?acao=listar&erro=dados_invalidor');
                    exit();
                }

                try {
                    $pdo = require_once __DIR__ . '/../../config/database.php';
                    $vendaModel = new Venda($pdo);
                    $sucesso = $vendaModel->salvarVenda($id_produto, (int)$quantidade);
                } catch (Exception $e) {
                    error_log("Erro no controller ao salvar venda: " . $e->getMessage());
                    $sucesso = false;
                }

                if ($sucesso) {
                    header('Location: /index.php?acao=historico&sucesso=venda_registrada');
                    exit();
                } else {
                    header('Location: /index.php?acao=listar&erro=estoque_insuficiente');
                    exit();
                }
                
            } else {
                header('Location: /index.php');
                exit();
            }
        }
    }
?>