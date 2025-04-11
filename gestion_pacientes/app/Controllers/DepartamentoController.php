<?php
require_once '../../config/database.php';

class DepartamentoController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function index() {
        $query = "SELECT * FROM departamentos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $query = "INSERT INTO departamentos (nombre) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre']]);
    }

    public function update($id, $data) {
        $query = "UPDATE departamentos SET nombre=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $id]);
    }

    public function destroy($id) {
        $query = "DELETE FROM departamentos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
