<?php
require_once '../model/Admin.php';

class AdminController {
    private $admin;

    public function __construct() {
        $this->admin = new Admin();
    }

    public function login($username, $password) {
        $user = $this->admin->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $user['id'];
            header("Location: /src/admin/admin_panel.php");
            exit();
        } else {
            return "Usuario o contraseña incorrecta";
        }
    }
}
?>
