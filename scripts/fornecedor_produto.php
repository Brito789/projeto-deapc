<?php
// fornecedor_produto.php: Formulário para o fornecedor fornecer novos produtos
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fornecer Produto</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="scripts.js"></script>
</head>
<body>
    <div class="container">
        <nav>
            <!-- Links para navegação -->
            <a href="listar_produtos.php">Ver Produtos</a>
            <a href="gestor_inventario.php">Gestão Inventário</a>
        </nav>
        <h2>Fornecer Novo Produto</h2>
        <!-- Formulário para inserir novo produto, chama JS de confirmação ao submeter -->
        <form action="guardar_produto.php" method="post" onsubmit="return confirmaEnvio(this);">
            <label>Nome do Produto:
                <input type="text" name="nome" id="nome" required>
            </label>
            <label>Descrição:
                <textarea name="descricao" id="descricao" required></textarea>
            </label>
            <label>Fornecedor:
                <input type="text" name="fornecedor" id="fornecedor" required>
            </label>
            <button type="submit">Fornecer</button>
        </form>
    </div>
</body>
</html>
