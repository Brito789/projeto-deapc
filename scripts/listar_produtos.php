<?php
require 'db.php';

$stmt = $db->query("SELECT nome, descricao FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($produtos);
?>
