<?php
echo "<pre>DEBUG: ";
print_r($_POST);
echo "</pre>";

// editar_produto.php
session_start();
include 'conexao.php';

if (!isset($_SESSION['id_fornecedor'])) {
    echo "Acesso negado.";
    exit;
}

$id_fornecedor = $_SESSION['id_fornecedor'];

$id_produto = $_POST['id_produto'] ?? null;
$nome = $_POST['nome'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$preco = $_POST['preco'] ?? 0;
$quantidade_stock = $_POST['quantidade_stock'] ?? 0;
$quantidade_minima = $_POST['quantidade_minima'] ?? 0;

echo "<h3>Dados recebidos:</h3>";
echo "ID Produto: $id_produto<br>";
echo "Nome: $nome<br>";
echo "Descrição: $descricao<br>";
echo "Preço: $preco<br>";
echo "Stock: $quantidade_stock<br>";
echo "Stock mínimo: $quantidade_minima<br>";

if ($id_produto && $nome && $preco >= 0) {
    $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade_stock = ?, quantidade_minima = ? 
            WHERE id_produto = ? AND id_fornecedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddiii", $nome, $descricao, $preco, $quantidade_stock, $quantidade_minima, $id_produto, $id_fornecedor);
    
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Produto atualizado com sucesso!</p>";
        // header("Location: dashboard.php");
    } else {
        echo "<p style='color:red;'>Erro ao atualizar produto.</p>";
    }
    $stmt->close();
} else {
    echo "<p style='color:red;'>Dados inválidos.</p>";
}
?>
    