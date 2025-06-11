<?php
// db_init.php: Inicializa a base de dados (corre uma vez)
$db = new SQLite3('inventario.db');
$db->exec("CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    descricao TEXT NOT NULL,
    preco REAL TEXT NOT NULL,
    estado TEXT NOT NULL DEFAULT 'pendente',
    data DATETIME DEFAULT CURRENT_TIMESTAMP
)");
$db->close();
echo "Base de dados criada!";
?>
