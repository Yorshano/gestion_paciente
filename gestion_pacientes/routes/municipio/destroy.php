<?php
require_once '../../app/controllers/MunicipioController.php';

if (isset($_GET['id'])) {
    $controller = new MunicipioController();
    $result = $controller->destroy($_GET['id']);
    
    echo json_encode(["success" => $result]);
}
?>
