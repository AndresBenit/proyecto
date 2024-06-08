<?php
require 'config/config.php';

try {
    $db = Database::getInstance()->getConnection();
    $result = $db->query("SELECT * FROM platos");

    if (!$result) {
        throw new Exception("Error en la consulta: " . $db->error);
    }

    $platos = $result->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dios y Tierra</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js" defer></script>
</head>
<body>

    <nav>
        <a href="#bienvenidos">Inicio</a>
        <a href="#menu">Carta</a>
        <a href="#biografia">Biografía</a>
        <a href="#reservar">Reservar</a>
        <a href="../src/admin/admin_login.php">Admin</a>
    </nav>

    <div class="carousel" id="bienvenidos">
        <img src="" alt="Logo del Restaurante">
        <div class="carousel-text">
            <h2>Él apaga la sed del sediento, y sacia con lo mejor al hambriento.</h2>
            <p>Salmo 107:9</p>
        </div>
    </div>

    <section class="section" id="menu">
        <h2>Carta</h2>
        <?php foreach ($platos as $plato): ?>
            <div class="menu-item">
                <h3><?php echo htmlspecialchars($plato['nombre']); ?></h3>
                <p><?php echo htmlspecialchars($plato['descripcion']); ?></p>
                <p>Precio: <?php echo number_format($plato['precio'], 2); ?>€</p>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="section" id="biografia">
        <h2>Biografía</h2>
        <p>Historia del restaurante...</p>
    </section>

    <section class="section" id="reservar">
        <h2>Reservar</h2>
        <form action="../src/reservar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            <button type="submit">Reservar</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Dios y Tierra. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
