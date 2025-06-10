<?php
// guardar_produto.php: Processa submissão do formulário e insere produto na BD

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $fornecedor = $_POST['fornecedor'];

    // Conecta à BD SQLite
    $db = new SQLite3('inventario.db');

    // Cria a tabela se não existir
    $db->exec("CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        descricao TEXT NOT NULL,
        fornecedor TEXT NOT NULL,
        estado TEXT NOT NULL DEFAULT 'pendente',
        data DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Prepara o comando para inserir
    $stmt = $db->prepare("INSERT INTO produtos (nome, descricao, fornecedor) VALUES (?, ?, ?)");
    $stmt->bindValue(1, $nome, SQLITE3_TEXT);
    $stmt->bindValue(2, $descricao, SQLITE3_TEXT);
    $stmt->bindValue(3, $fornecedor, SQLITE3_TEXT);

    // Executa e mostra mensagem
    if ($stmt->execute()) {
        $msg = "Produto fornecido com sucesso!";
    } else {
        $msg = "Erro ao fornecer produto.";
    }
    $db->close();
} else {
    $msg = "Acesso inválido.";
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fornecer Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="resposta"><?= htmlspecialchars($msg) ?></div>
        <a href="fornecedor_produto.php" class="btn">Fornecer outro produto</a>
        <a href="listar_produtos.php" class="btn">Ver Produtos</a>
    </div>
</body>
</html>
