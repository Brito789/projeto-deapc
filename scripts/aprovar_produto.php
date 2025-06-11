<?php
// aprovar_produto.php: Aprova o produto
if (!isset($_GET['id'])) die('ID não especificado.');
$id = intval($_GET['id']);
$db = new SQLite3('inventario.db');
$stmt = $db->prepare("UPDATE produtos SET estado='aprovado' WHERE id=?");
$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$stmt->execute();
$db->close();
header("Location: gestor_inventario.php");
exit;
?>
