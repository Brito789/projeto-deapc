<?php
echo "<pre>DEBUG: ";
print_r($_POST);
echo "</pre>";

// Exemplo simples de backend para futuras integrações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pesquisa = $_POST['pesquisa'] ?? '';
  // Aqui poderia ligar à base de dados e devolver resultados
  echo "A procurar por: " . htmlspecialchars($pesquisa);
}
?>
