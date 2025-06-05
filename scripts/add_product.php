<?php
require 'db.php';

echo "<pre>DEBUG POST: ";
print_r($_POST);
echo "</pre>";

$nome = $_POST['nome'] ?? '';
$descricao = $_POST['descricao'] ?? '';

if ($nome && $descricao) {
    $stmt = $db->prepare("INSERT INTO produtos (nome, descricao) VALUES (?, ?)");
    $stmt->execute([$nome, $descricao]);
    echo "Produto adicionado com sucesso.";
} else {
    echo "Erro: Preencha todos os campos.";
}
?>
