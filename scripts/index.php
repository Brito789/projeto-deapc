<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('inventario.db');

// Garante que a tabela existe:
$db->exec("CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    descricao TEXT NOT NULL,
    fornecedor TEXT NOT NULL,
    estado TEXT NOT NULL DEFAULT 'pendente',
    data DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$result = $db->query('SELECT * FROM produtos');
$produtos = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $produtos[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Gestão de Inventário</title>
  <link rel="stylesheet" href="../styles/index.css">
  <script src="index.js" defer></script>
</head>
<body>
  <header>
    <h1>Gestão de Inventário</h1>
    <div class="top-bar">
      <input type="text" placeholder="Pesquisar produtos..." class="search-box">
      <div class="icons">
        <img src="../images/conta.png" alt="Conta" title="Conta do Utilizador" onclick="irParaConta()">
        <img src="../images/conversa.webp" alt="Conversas" title="Conversas" onclick="irParaConversas()">
        <img src="../images/defenição.jpg" alt="Definições" title="Definições" onclick="irParaDefinicoes()">
      </div>
    </div>
  </header>

  <main>
    <section class="produtos">
      <?php if (empty($produtos)): ?>
        <p style="font-size:18px; color: #a00; margin: 30px 0;">Ainda não existe nenhum produto registado na base de dados.</p>
      <?php else: ?>
        <?php foreach ($produtos as $produto): ?>
          <div class="produto">
            <h2><?php echo htmlspecialchars($produto['nome']); ?></h2>
            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($produto['descricao']); ?></p>
            <p><strong>Preço:</strong> <?php echo htmlspecialchars($produto['preco']); ?></p>
            <p><strong>Estado:</strong> <?php echo htmlspecialchars($produto['estado']); ?></p>
            <p><small><?php echo htmlspecialchars($produto['data']); ?></small></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>


