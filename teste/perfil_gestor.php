<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['tipo'] !== 'gestor') {
    header("Location: index.html");
    exit;
}
?>
<h1>Área do Gestor</h1>
<p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
