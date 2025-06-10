<?php
// listar_produtos.php: Lista todos os produtos fornecidos
$db = new SQLite3('inventario.db');
$result = $db->query("SELECT id, nome, fornecedor, estado FROM produtos ORDER BY data DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="fornecedor_produto.php">Fornecer Produto</a>
            <a href="gestor_inventario.php">Gestão Inventário</a>
        </nav>
        <h2>Lista de Produtos</h2>
        <ul class="lista-produtos">
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <li class="<?= htmlspecialchars($row['estado']) ?>">
                    <strong><?= htmlspecialchars($row['nome']) ?></strong>
                    <span class="status <?= htmlspecialchars($row['estado']) ?>">
                        <?= ucfirst(htmlspecialchars($row['estado'])) ?>
                    </span>
                    <br>
                    <span style="font-size:0.98em;color:#7c33c4;">
                        Fornecedor: <?= htmlspecialchars($row['fornecedor']) ?>
                    </span>
                    <br>
                    <a href="ver_produto.php?id=<?= $row['id'] ?>" class="btn" style="margin-top:7px;">Ver detalhes</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
<?php $db->close(); ?>
