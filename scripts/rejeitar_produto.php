<?php
// rejeitar_produto.php: Rejeita o produto
if (!isset($_GET['id'])) die('ID não especificado.');
$id = intval($_GET['id']);
$db = new SQLite3('inventario.db');
$stmt = $db->prepare("UPDATE produtos SET estado='rejeitado' WHERE id=?");
$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$stmt->execute();
$db->close();
header("Location: gestor_inventario.php");
exit;
?>
