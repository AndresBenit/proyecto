<?php
require '../config/config.php';

$db = Database::getInstance()->getConnection();

$sql = "DROP TABLE IF EXISTS admins";
$db->query($sql);

$sql = "CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
$db->query($sql);

$sql = "DROP TABLE IF EXISTS platos";
$db->query($sql);

$sql = "CREATE TABLE platos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
)";
$db->query($sql);
?>
