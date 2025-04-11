<?php
require_once '../../app/controllers/PacienteController.php';

$controller = new PacienteController();
$pacientes = $controller->index();

header('Content-Type: application/json');
echo json_encode($pacientes);
?>
