<?php
require_once '../../app/controllers/GeneroController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $controller = new GeneroController();
    $controller->update($id, $nombre);
}
?>
