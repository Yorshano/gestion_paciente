<?php
require_once '../../app/controllers/MunicipioController.php';

$controller = new MunicipioController();
$municipios = $controller->index();

header('Content-Type: application/json');
echo json_encode($municipios);
?>
