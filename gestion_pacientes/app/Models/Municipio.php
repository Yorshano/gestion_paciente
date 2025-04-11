<?php
require_once __DIR__ . '/../config/Database.php';

class Municipio {
    private $conn;
    private $table = "municipios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $query = "SELECT m.*, d.nombre AS departamento FROM " . $this->table . " m JOIN departamentos d ON m.departamento_id = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($departamento_id, $nombre) {
        $query = "INSERT INTO " . $this->table . " (departamento_id, nombre) VALUES (:departamento_id, :nombre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departamento_id', $departamento_id);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    public function update($id, $departamento_id, $nombre) {
        $query = "UPDATE " . $this->table . " SET departamento_id = :departamento_id, nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':departamento_id', $departamento_id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
