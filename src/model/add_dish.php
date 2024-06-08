<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $db = Database::getInstance()->getConnection();

    $stmt = $db->prepare("INSERT INTO dishes (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param('ssd', $name, $description, $price);

    if ($stmt->execute()) {
        echo "Plato agregado exitosamente.";
    } else {
        echo "Error al agregar el plato: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
?>
