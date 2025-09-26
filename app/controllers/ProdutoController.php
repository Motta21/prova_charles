<?php
    class ProdutoController {
        public function listar() {
            require_once __DIR__ . '/../models/Produto.php';

            $pdo = require_once __DIR__ . '/../../config/database.php';

            $produtoModel = new Produto($pdo);
            $listaProdutos = $produtoModel->listarTodos();

            require_once __DIR__ . '/../views/produtos/listar.php';
        }
    }
?>