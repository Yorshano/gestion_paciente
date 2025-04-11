document.addEventListener("DOMContentLoaded", () => {
    cargarTiposDocumento();

    document.getElementById("formTipoDocumento").addEventListener("submit", function(event) {
        event.preventDefault();
        let id = document.getElementById("tipoDocumentoId").value;
        let nombre = document.getElementById("nombre").value;

        if (id) {
            actualizarTipoDocumento(id, nombre);
        } else {
            crearTipoDocumento(nombre);
        }
    });
});

function cargarTiposDocumento() {
    fetch("../../routes/tipo_documento/index.php")
        .then(response => response.json())
        .then(data => {
            let lista = document.getElementById("tipoDocumentoLista");
            lista.innerHTML = "";
            data.forEach(tipo => {
                lista.innerHTML += `
                    <tr>
                        <td>${tipo.id}</td>
                        <td>${tipo.nombre}</td>
                        <td>
                            <button onclick="editarTipoDocumento(${tipo.id}, '${tipo.nombre}')">Editar</button>
                            <button onclick="eliminarTipoDocumento(${tipo.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function crearTipoDocumento(nombre) {
    fetch("../../routes/tipo_documento/store.php", {
        method: "POST",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarTiposDocumento();
        document.getElementById("formTipoDocumento").reset();
    });
}

function actualizarTipoDocumento(id, nombre) {
    fetch(`../../routes/tipo_documento/update.php?id=${id}`, {
        method: "PUT",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarTiposDocumento();
        document.getElementById("formTipoDocumento").reset();
    });
}

function eliminarTipoDocumento(id) {
    fetch(`../../routes/tipo_documento/destroy.php?id=${id}`, { method: "DELETE" })
        .then(() => cargarTiposDocumento());
}

function editarTipoDocumento(id, nombre) {
    document.getElementById("tipoDocumentoId").value = id;
    document.getElementById("nombre").value = nombre;
}
