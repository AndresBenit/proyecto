<?php
define('DB_HOST', '127.0.0.1');
define('DB_PORT', 3307); // Especificar el puerto por separado
define('DB_USER', 'root');
define('DB_PASS', 'Benitezrap313.');
define('DB_NAME', 'Restaurante');

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilitar el informe de errores de MySQLi
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); // Especificar el puerto aquí

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
