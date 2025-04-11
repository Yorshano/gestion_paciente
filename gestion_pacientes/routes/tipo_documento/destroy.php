<?php
require_once '../../app/controllers/TipoDocumentoController.php';

if (isset($_GET['id'])) {
    $controller = new TipoDocumentoController();
    $result = $controller->destroy($_GET['id']);
    
    echo json_encode(["success" => $result]);
}
?>
