<?php

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
        <form action="guardar_produto.php" method="post" onsubmit="return validaCampos()">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" required step="0.01" min="0">

            <button type="submit">Submeter</button>
        </form>
    </div>
</body>
</html>
