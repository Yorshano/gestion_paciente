<?php
require_once '../../app/controllers/DepartamentoController.php';

if (isset($_GET['id'])) {
    $controller = new DepartamentoController();
    $result = $controller->destroy($_GET['id']);
    
    echo json_encode(["success" => $result]);
}
?>
