<?php
require_once '../../config/database.php';

class PacienteController {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Listar pacientes con relaciones
    public function index() {
        $query = "SELECT p.id, p.numero_documento, p.nombre1, p.nombre2, p.apellido1, p.apellido2, 
                         p.correo, 
                         t.nombre AS tipo_documento, 
                         g.nombre AS genero, 
                         d.nombre AS departamento, 
                         m.nombre AS municipio
                  FROM paciente p
                  INNER JOIN tipos_documento t ON p.tipo_documento_id = t.id
                  INNER JOIN genero g ON p.genero_id = g.id
                  INNER JOIN departamentos d ON p.departamento_id = d.id
                  INNER JOIN municipios m ON p.municipio_id = m.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un solo paciente
    public function show($id) {
        $query = "SELECT * FROM paciente WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear paciente
    public function store($data) {
        $query = "INSERT INTO paciente (tipo_documento_id, numero_documento, nombre1, nombre2, apellido1, apellido2, 
                                        genero_id, departamento_id, municipio_id, correo)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['tipo_documento_id'], $data['numero_documento'], $data['nombre1'], 
            $data['nombre2'], $data['apellido1'], $data['apellido2'], 
            $data['genero_id'], $data['departamento_id'], $data['municipio_id'], 
            $data['correo']
        ]);
    }

    // Actualizar paciente
    public function update($id, $data) {
        $query = "UPDATE paciente SET tipo_documento_id=?, numero_documento=?, nombre1=?, nombre2=?, 
                                    apellido1=?, apellido2=?, genero_id=?, departamento_id=?, 
                                    municipio_id=?, correo=?
                  WHERE id=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['tipo_documento_id'], $data['numero_documento'], $data['nombre1'], 
            $data['nombre2'], $data['apellido1'], $data['apellido2'], 
            $data['genero_id'], $data['departamento_id'], $data['municipio_id'], 
            $data['correo'], $id
        ]);
    }

    // Eliminar paciente
    public function destroy($id) {
        $query = "DELETE FROM paciente WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
