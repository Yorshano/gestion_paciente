<?php
require_once '../../app/controllers/TipoDocumentoController.php';

$controller = new TipoDocumentoController();
$tipos = $controller->index();

header('Content-Type: application/json');
echo json_encode($tipos);
?>
