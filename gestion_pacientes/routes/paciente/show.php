<?php
require_once '../../app/controllers/PacienteController.php';

if (isset($_GET['id'])) {
    $controller = new PacienteController();
    $paciente = $controller->show($_GET['id']);

    header('Content-Type: application/json');
    echo json_encode($paciente);
}
?>
