<?php
session_start();
$db = new SQLite3('test.db');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    $stmt = $db->prepare("SELECT * FROM utilizadores WHERE username = :username");
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['tipo'] = $user['tipo'];

        if ($user['tipo'] === 'gestor') {
            header('Location: perfil_gestor.php');
        } else {
            header('Location: perfil_fornecedor.php');
        }
        exit;
    } else {
        echo "Login falhou: credenciais inválidas.";
    }
} else {
    echo "Por favor preencha username e password.";
}
?>

