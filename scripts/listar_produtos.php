<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('inventario.db');

// Garante que a tabela existe
$db->exec("CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    descricao TEXT NOT NULL,
    preco REAL NOT NULL,
    estado TEXT NOT NULL DEFAULT 'pendente',
    data DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Adiciona um produto de teste (comenta após o primeiro teste)
// $db->exec("INSERT INTO produtos (nome, descricao, preco, estado) VALUES ('Produto Teste', 'Descrição teste', 15.99, 'ativo')");

$result = $db->query('SELECT * FROM produtos');
if (!$result) {
    die("Erro na query: " . $db->lastErrorMsg());
}
/*while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo '<pre>'; print_r($row); echo '</pre>';
}*/
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Página principal</a>
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
                        Preço: <?= htmlspecialchars($row['preco']) ?>
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
