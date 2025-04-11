<?php
require_once '../../app/controllers/PacienteController.php';

if (isset($_GET['id'])) {
    $controller = new PacienteController();
    $result = $controller->destroy($_GET['id']);
    
    echo json_encode(["success" => $result]);
}
?>
