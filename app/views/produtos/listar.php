<?php 
include '../../config/config.php'; 
include '../template/header.php';

$stmt = $pdo->query("SELECT * FROM PRODUTOS");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Produtos</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ação</th>
    </tr>
    <?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= $produto['nome'] ?></td>
        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
        <td>
            <form method="post" action="/comprar.php">
                <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                <button type="submit">Comprar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../template/footer.php'; ?>
