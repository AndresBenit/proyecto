<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dish_id = $_POST['dish_id'];

    $db = Database::getInstance()->getConnection();

    $stmt = $db->prepare("DELETE FROM dishes WHERE id = ?");
    $stmt->bind_param('i', $dish_id);

    if ($stmt->execute()) {
        echo "Plato eliminado exitosamente.";
    } else {
        echo "Error al eliminar el plato: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
?>
