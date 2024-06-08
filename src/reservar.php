<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $hora = htmlspecialchars($_POST['hora']);

    // Validar los datos
    if (!empty($nombre) && !empty($telefono) && !empty($fecha) && !empty($hora)) {
        // Formatear el mensaje para WhatsApp
        $mensaje = "Nueva reserva:\n\n";
        $mensaje .= "Nombre: $nombre\n";
        $mensaje .= "Teléfono: $telefono\n";
        $mensaje .= "Fecha: $fecha\n";
        $mensaje .= "Hora: $hora";

        // Número de teléfono de WhatsApp donde enviar el mensaje
        $whatsapp_number = '3209726680'; 

        // URL de WhatsApp API
        $whatsapp_url = "https://api.whatsapp.com/send?phone=$whatsapp_number&text=" . urlencode($mensaje);

        // Redirigir al usuario a WhatsApp
        header("Location: $whatsapp_url");
        exit();
    } else {
        // Si los datos no son válidos, mostrar un mensaje de error
        echo "Todos los campos son obligatorios.";
    }
} else {
    // Si el formulario no se ha enviado, redirigir al usuario a la página principal
    header("Location: ../public/index.html");
    exit();
}
?>
