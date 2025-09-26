<?php 
include '../../config/config.php'; 
include '../template/header.php';

$stmt = $pdo->query("SELECT v.id, p.nome as produto, v.quantidade, v.data 
                     FROM vendas v 
                     JOIN produtos p ON v.produto_id = p.id 
                     ORDER BY v.data DESC");

$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Histórico de Vendas</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID Venda</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Data</th>
    </tr>
    <?php foreach ($vendas as $venda): ?>
    <tr>
        <td><?= $venda['id'] ?></td>
        <td><?= $venda['produto'] ?></td>
        <td><?= $venda['quantidade'] ?></td>
        <td><?= date('d/m/Y H:i', strtotime($venda['data'])) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../template/footer.php'; ?>
