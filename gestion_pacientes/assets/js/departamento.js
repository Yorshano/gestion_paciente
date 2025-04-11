document.addEventListener("DOMContentLoaded", () => {
    cargarDepartamentos();

    document.getElementById("formDepartamento").addEventListener("submit", function(event) {
        event.preventDefault();
        let id = document.getElementById("departamentoId").value;
        let nombre = document.getElementById("nombre").value;

        if (id) {
            actualizarDepartamento(id, nombre);
        } else {
            crearDepartamento(nombre);
        }
    });
});

function cargarDepartamentos() {
    fetch("../../routes/departamento/index.php")
        .then(response => response.json())
        .then(data => {
            let lista = document.getElementById("departamentoLista");
            lista.innerHTML = "";
            data.forEach(depto => {
                lista.innerHTML += `
                    <tr>
                        <td>${depto.id}</td>
                        <td>${depto.nombre}</td>
                        <td>
                            <button onclick="editarDepartamento(${depto.id}, '${depto.nombre}')">Editar</button>
                            <button onclick="eliminarDepartamento(${depto.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function crearDepartamento(nombre) {
    fetch("../../routes/departamento/store.php", {
        method: "POST",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarDepartamentos();
        document.getElementById("formDepartamento").reset();
    });
}

function actualizarDepartamento(id, nombre) {
    fetch(`../../routes/departamento/update.php?id=${id}`, {
        method: "PUT",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarDepartamentos();
        document.getElementById("formDepartamento").reset();
    });
}

function eliminarDepartamento(id) {
    fetch(`../../routes/departamento/destroy.php?id=${id}`, { method: "DELETE" })
        .then(() => cargarDepartamentos());
}

function editarDepartamento(id, nombre) {
    document.getElementById("departamentoId").value = id;
    document.getElementById("nombre").value = nombre;
}
