<?php
require_once '../../app/controllers/PacienteController.php';
require_once '../../app/controllers/DepartamentoController.php';
require_once '../../app/controllers/MunicipioController.php';
require_once '../../app/controllers/GeneroController.php';
require_once '../../app/controllers/TipoDocumentoController.php';

$pacienteController = new PacienteController();
$departamentoController = new DepartamentoController();
$municipioController = new MunicipioController();
$generoController = new GeneroController();
$tipoDocumentoController = new TipoDocumentoController();

$pacientes = $pacienteController->index();
$departamentos = $departamentoController->index();
$municipios = $municipioController->index();
$generos = $generoController->index();
$tiposDocumento = $tipoDocumentoController->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pacientes</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <script src="../../public/js/paciente.js" defer></script>
</head>
<body>

<h2>Gestión de Pacientes</h2>

<form id="pacienteForm">
    <input type="hidden" id="paciente_id">
    
    <label>Tipo de Documento:</label>
    <select id="tipo_documento_id">
        <?php foreach ($tiposDocumento as $tipo) {
            echo "<option value='{$tipo['id']}'>{$tipo['nombre']}</option>";
        } ?>
    </select>

    <label>Número de Documento:</label>
    <input type="text" id="numero_documento">

    <label>Nombre 1:</label>
    <input type="text" id="nombre1">

    <label>Nombre 2:</label>
    <input type="text" id="nombre2">

    <label>Apellido 1:</label>
    <input type="text" id="apellido1">

    <label>Apellido 2:</label>
    <input type="text" id="apellido2">

    <label>Género:</label>
    <select id="genero_id">
        <?php foreach ($generos as $genero) {
            echo "<option value='{$genero['id']}'>{$genero['nombre']}</option>";
        } ?>
    </select>

    <label>Departamento:</label>
    <select id="departamento_id" onchange="loadMunicipios(this.value)">
        <?php foreach ($departamentos as $depto) {
            echo "<option value='{$depto['id']}'>{$depto['nombre']}</option>";
        } ?>
    </select>

    <label>Municipio:</label>
    <select id="municipio_id">
        <?php foreach ($municipios as $mun) {
            echo "<option value='{$mun['id']}'>{$mun['nombre']}</option>";
        } ?>
    </select>

    <label>Correo Electrónico:</label>
    <input type="email" id="correo">

    <button type="button" onclick="savePaciente()">Guardar</button>
</form>

<h3>Lista de Pacientes</h3>
<table id="pacientes">
    <thead>
        <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Género</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pacientes as $paciente) {
            echo "<tr>
                <td>{$paciente['id']}</td>
                <td>{$paciente['tipo_documento']} - {$paciente['numero_documento']}</td>
                <td>{$paciente['nombre1']} {$paciente['nombre2']}</td>
                <td>{$paciente['apellido1']} {$paciente['apellido2']}</td>
                <td>{$paciente['genero']}</td>
                <td>{$paciente['departamento']}</td>
                <td>{$paciente['municipio']}</td>
                <td>{$paciente['correo']}</td>
                <td>
                    <button onclick='editPaciente({$paciente['id']})'>Editar</button>
                    <button onclick='deletePaciente({$paciente['id']})'>Eliminar</button>
                </td>
            </tr>";
        } ?>
    </tbody>
</table>

</body>
</html>
