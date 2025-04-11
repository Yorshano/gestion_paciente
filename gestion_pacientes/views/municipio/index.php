<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Municipios</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <h2>Gestión de Municipios</h2>

    <form id="formMunicipio">
        <input type="hidden" id="municipioId">
        <input type="text" id="nombre" placeholder="Nombre del Municipio" required>
        <select id="departamento_id" required></select>
        <button type="submit">Guardar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="municipioLista"></tbody>
    </table>

    <script src="../../public/js/municipio.js"></script>
</body>
</html>
