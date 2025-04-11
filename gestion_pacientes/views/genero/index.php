<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Género</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <h2>Gestión de Género</h2>

    <form id="formGenero">
        <input type="hidden" id="generoId">
        <input type="text" id="nombre" placeholder="Nombre del Género" required>
        <button type="submit">Guardar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="generoLista"></tbody>
    </table>

    <script src="../../public/js/genero.js"></script>
</body>
</html>
