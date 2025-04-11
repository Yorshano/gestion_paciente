<?php
require_once '../../app/controllers/DepartamentoController.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $controller = new DepartamentoController();
    $result = $controller->store($data);
    
    echo json_encode(["success" => $result]);
}
?>
