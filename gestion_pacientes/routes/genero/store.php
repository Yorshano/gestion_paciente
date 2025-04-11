<?php
require_once '../../app/controllers/GeneroController.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $controller = new GeneroController();
    $result = $controller->store($data);
    
    echo json_encode(["success" => $result]);
}
?>
