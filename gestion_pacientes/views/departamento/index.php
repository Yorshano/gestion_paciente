<?php
require_once '../../app/controllers/DepartamentoController.php';

$controller = new DepartamentoController();
$departamentos = $controller->index();

header('Content-Type: application/json');
echo json_encode($departamentos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Departamentos</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h2>Departamentos</h2>
    <form action="../../routes/departamento/store.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del Departamento" required>
        <button type="submit">Agregar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departamentos as $d): ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= $d['nombre'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id'] ?>">Editar</a>
                        <a href="../../routes/departamento/destroy.php?id=<?= $d['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
