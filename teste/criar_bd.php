<?php
$db = new SQLite3('test.db');

// Criar tabela de utilizadores
$db->exec("CREATE TABLE IF NOT EXISTS utilizadores (
    id INTEGER PRIMARY KEY,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    tipo TEXT CHECK(tipo IN ('gestor', 'fornecedor')) NOT NULL
)");

// Inserir utilizadores de teste (as passwords são '1234' e 'abcd')
$db->exec("INSERT INTO utilizadores (username, password, tipo) VALUES (
    'fornecedor1', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'fornecedor'
)");

$db->exec("INSERT INTO utilizadores (username, password, tipo) VALUES (
    'gestor1', '" . password_hash('abcd', PASSWORD_DEFAULT) . "', 'gestor'
)");

echo "Base de dados e utilizadores criados.";
?>