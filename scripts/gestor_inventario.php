<?php
// gestor_inventario.php: Interface do gestor para aprovar/rejeitar produtos pendentes
$db = new SQLite3('inventario.db');
$result = $db->query("SELECT * FROM produtos WHERE estado='pendente' ORDER BY data ASC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Inventário</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="fornecedor_produto.php">Fornecer Produto</a>
            <a href="listar_produtos.php">Ver Produtos</a>
        </nav>
        <h2>Produtos Pendentes</h2>
        <ul class="lista-produtos">
        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <li class="pendente">
                <strong><?= htmlspecialchars($row['nome']) ?></strong>
                <span class="status pendente">Pendente</span>
                <br>
                <span style="font-size:0.98em;color:#7c33c4;">
                    Fornecedor: <?= htmlspecialchars($row['fornecedor']) ?>
                </span>
                <br>
                <a href="ver_produto.php?id=<?= $row['id'] ?>" class="btn">Ver detalhes</a>
                <a href="aprovar_produto.php?id=<?= $row['id'] ?>" class="btn" style="background:linear-gradient(90deg,#6adb83,#24b66a);margin-left:7px;">Aprovar</a>
                <a href="rejeitar_produto.php?id=<?= $row['id'] ?>" class="btn" style="background:linear-gradient(90deg,#e24b6a,#c02d42);margin-left:7px;">Rejeitar</a>
            </li>
        <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
<?php $db->close(); ?>
