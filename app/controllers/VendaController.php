<?php
    class VendaController {
        public function listar() {
            require_once __DIR__ . '/../models/Venda.php';

            $pdo = require_once __DIR__ . '/../../config/database.php';

            $vendaModel = new Venda($pdo);
            $listaVendas = $vendaModel->listarVendas();

            require_once __DIR__ . '/../views/produtos/listar.php';
        }
    }
?>