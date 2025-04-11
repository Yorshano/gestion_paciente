<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tipos de Documento</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <h2>Gestión de Tipos de Documento</h2>

    <form id="formTipoDocumento">
        <input type="hidden" id="tipoDocumentoId">
        <input type="text" id="nombre" placeholder="Nombre del Tipo de Documento" required>
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
        <tbody id="tipoDocumentoLista"></tbody>
    </table>

    <script src="../../public/js/tipo_documento.js"></script>
</body>
</html>
