<?php
require 'config.php';

// Datos del administrador inicial
$username = 'admin';
$password = password_hash('Benitezrap313.', PASSWORD_DEFAULT); // Cambia 'password' por la contraseña deseada

// Insertar administrador
$sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Administrador añadido con éxito";
} else {
    echo "Error al añadir administrador: " . $conn->error;
}

$conn->close();
?>
