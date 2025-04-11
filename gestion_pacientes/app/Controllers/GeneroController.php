<?php
require_once '../../config/database.php';

class GeneroController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function index() {
        $query = "SELECT * FROM genero";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $query = "INSERT INTO genero (nombre) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre']]);
    }

    public function update($id, $data) {
        $query = "UPDATE genero SET nombre=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $id]);
    }

    public function destroy($id) {
        $query = "DELETE FROM genero WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
