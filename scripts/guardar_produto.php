<?php
echo '<pre>'; print_r($_POST); echo '</pre>';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('inventario.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? '';

    if (empty($nome) || empty($descricao) || empty($preco)) {
        die('Todos os campos são obrigatórios.');
    }

    $stmt = $db->prepare("INSERT INTO produtos (nome, descricao, preco, estado) VALUES (:nome, :descricao, :preco, 'pendente')");
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':preco', $preco, SQLITE3_FLOAT);

    if ($stmt->execute()) {
        header("Location: listar_produtos.php?msg=sucesso");
        exit;
    } else {
        die('Erro ao guardar: ' . $db->lastErrorMsg());
    }
} else {
    die('Acesso inválido.');
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fornecer Produto</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <div class="resposta"><?= htmlspecialchars($msg) ?></div>
        <a href="fornecedor_produto.php" class="btn">Fornecer outro produto</a>
        <a href="listar_produtos.php" class="btn">Ver Produtos</a>
    </div>
</body>
</html>
