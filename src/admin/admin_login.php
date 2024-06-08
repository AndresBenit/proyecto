<?php
require '../../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo 'Por favor, complete todos los campos.';
        exit();
    }

    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin'] = $user['id'];
        header('Location: admin_panel.php');
    } else {
        echo 'Usuario o contraseña incorrectos.';
    }
}
?>
