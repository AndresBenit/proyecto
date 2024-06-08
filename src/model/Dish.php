<?php
class Dish {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM dishes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($name, $description) {
        $stmt = $this->conn->prepare("INSERT INTO dishes (name, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $description);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM dishes WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
