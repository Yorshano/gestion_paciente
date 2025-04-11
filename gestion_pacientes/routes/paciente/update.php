<?php
require_once '../../app/controllers/PacienteController.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($_GET['id']) && $data) {
    $controller = new PacienteController();
    $result = $controller->update($_GET['id'], $data);
    
    echo json_encode(["success" => $result]);
}
?>
