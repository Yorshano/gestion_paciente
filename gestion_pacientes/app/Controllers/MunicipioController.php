<?php
require_once '../../config/database.php';

class MunicipioController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function index() {
        $query = "SELECT municipios.id, municipios.nombre, departamentos.nombre AS departamento
                  FROM municipios 
                  INNER JOIN departamentos ON municipios.departamento_id = departamentos.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $query = "INSERT INTO municipios (nombre, departamento_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $data['departamento_id']]);
    }

    public function update($id, $data) {
        $query = "UPDATE municipios SET nombre=?, departamento_id=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nombre'], $data['departamento_id'], $id]);
    }

    public function destroy($id) {
        $query = "DELETE FROM municipios WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
