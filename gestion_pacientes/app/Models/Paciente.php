<?php
require_once __DIR__ . '/../config/Database.php';

class Paciente {
    private $conn;
    private $table = "pacientes";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT pacientes.*, 
                         tipos_documento.nombre AS tipo_documento, 
                         generos.nombre AS genero, 
                         departamentos.nombre AS departamento, 
                         municipios.nombre AS municipio 
                  FROM " . $this->table . " 
                  JOIN tipos_documento ON pacientes.tipo_documento_id = tipos_documento.id 
                  JOIN generos ON pacientes.genero_id = generos.id 
                  JOIN departamentos ON pacientes.departamento_id = departamentos.id 
                  JOIN municipios ON pacientes.municipio_id = municipios.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($datos) {
        $query = "INSERT INTO " . $this->table . " 
                  (tipo_documento_id, numero_documento, nombre1, nombre2, apellido1, apellido2, 
                   genero_id, departamento_id, municipio_id, correo) 
                  VALUES (:tipo_documento_id, :numero_documento, :nombre1, :nombre2, 
                          :apellido1, :apellido2, :genero_id, :departamento_id, 
                          :municipio_id, :correo)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($datos);
    }

    public function actualizar($datos) {
        $query = "UPDATE " . $this->table . " SET 
                  tipo_documento_id = :tipo_documento_id, 
                  numero_documento = :numero_documento, 
                  nombre1 = :nombre1, 
                  nombre2 = :nombre2, 
                  apellido1 = :apellido1, 
                  apellido2 = :apellido2, 
                  genero_id = :genero_id, 
                  departamento_id = :departamento_id, 
                  municipio_id = :municipio_id, 
                  correo = :correo 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($datos);
    }

    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
