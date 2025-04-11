<?php
require_once '../../app/controllers/GeneroController.php';

if (isset($_GET['id'])) {
    $controller = new GeneroController();
    $result = $controller->destroy($_GET['id']);
    
    echo json_encode(["success" => $result]);
}
?>
