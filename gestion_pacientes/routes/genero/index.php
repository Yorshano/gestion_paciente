<?php
require_once '../../app/controllers/GeneroController.php';

$controller = new GeneroController();
$generos = $controller->index();

header('Content-Type: application/json');
echo json_encode($generos);
?>
