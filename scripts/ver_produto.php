<?php
// ver_produto.php: Mostra detalhes individuais de cada produto
if (!isset($_GET['id'])) {
    die('Produto não especificado.');
}
$db = new SQLite3('inventario.db');
$id = intval($_GET['id']);
// Prepara statement para obter info do produto
$stmt = $db->prepare("SELECT * FROM produtos WHERE id=?");
$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="listar_produtos.php">Voltar à lista</a>
        </nav>
        <?php if (!$result): ?>
            <div class="resposta">Produto não encontrado.</div>
        <?php else: ?>
            <h2><?= htmlspecialchars($result['nome']) ?></h2>
            <p><b>Descrição:</b><br>
            <?= nl2br(htmlspecialchars($result['descricao'])) ?></p>
            <p><b>Fornecedor:</b> <?= htmlspecialchars($result['fornecedor']) ?></p>
            <p><b>Estado:</b> <span class="status <?= htmlspecialchars($result['estado']) ?>"><?= htmlspecialchars($result['estado']) ?></span></p>
            <p><b>Inserido em:</b> <?= htmlspecialchars($result['data']) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $db->close(); ?>
