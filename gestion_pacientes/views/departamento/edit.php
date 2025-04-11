<?php
require_once '../../app/controllers/DepartamentoController.php';
$controller = new DepartamentoController();
$departamento = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $departamento = array_filter($controller->index(), fn($d) => $d['id'] == $id)[0];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Departamento</title>
</head>
<body>
    <h2>Editar Departamento</h2>
    <form action="../../routes/departamento/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $departamento['id'] ?>">
        <input type="text" name="nombre" value="<?= $departamento['nombre'] ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
