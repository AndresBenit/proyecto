<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../../public/admin.html');
    exit();
}

require '../../config/config.php';

$db = Database::getInstance()->getConnection();
$result = $db->query("SELECT * FROM platos");
$platos = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <script src="../../public/js/admin.js" defer></script>
</head>
<body>
    <header>
        <h1>Panel Admin</h1>
    </header>
    <section class="admin">
        <h2>Agregar Plato</h2>
        <form id="add-dish-form">
            <label for="dish-name">Nombre del Plato:</label>
            <input type="text" id="dish-name" name="nombre" required>
            <label for="dish-description">Descripción:</label>
            <textarea id="dish-description" name="descripcion" required></textarea>
            <label for="dish-image">URL de la Imagen:</label>
            <input type="url" id="dish-image" name="imagen" required>
            <button type="submit">Agregar</button>
        </form>
    </section>
    <section class="admin">
        <h2>Lista de Platos</h2>
        <div id="dish-list">
            <?php foreach ($platos as $plato) : ?>
                <div>
                    <h3><?php echo htmlspecialchars($plato['nombre']); ?></h3>
                    <p><?php echo htmlspecialchars($plato['descripcion']); ?></p>
                    <img src="<?php echo htmlspecialchars($plato['imagen']); ?>" alt="<?php echo htmlspecialchars($plato['nombre']); ?>">
                    <button class="delete-dish" data-id="<?php echo $plato['id']; ?>">Eliminar</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Dios y Tierra. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
