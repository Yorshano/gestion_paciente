document.addEventListener("DOMContentLoaded", () => {
    cargarGeneros();

    document.getElementById("formGenero").addEventListener("submit", function(event) {
        event.preventDefault();
        let id = document.getElementById("generoId").value;
        let nombre = document.getElementById("nombre").value;

        if (id) {
            actualizarGenero(id, nombre);
        } else {
            crearGenero(nombre);
        }
    });
});

function cargarGeneros() {
    fetch("../../routes/genero/index.php")
        .then(response => response.json())
        .then(data => {
            let lista = document.getElementById("generoLista");
            lista.innerHTML = "";
            data.forEach(genero => {
                lista.innerHTML += `
                    <tr>
                        <td>${genero.id}</td>
                        <td>${genero.nombre}</td>
                        <td>
                            <button onclick="editarGenero(${genero.id}, '${genero.nombre}')">Editar</button>
                            <button onclick="eliminarGenero(${genero.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function crearGenero(nombre) {
    fetch("../../routes/genero/store.php", {
        method: "POST",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarGeneros();
        document.getElementById("formGenero").reset();
    });
}

function actualizarGenero(id, nombre) {
    fetch(`../../routes/genero/update.php?id=${id}`, {
        method: "PUT",
        body: JSON.stringify({ nombre }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarGeneros();
        document.getElementById("formGenero").reset();
    });
}

function eliminarGenero(id) {
    fetch(`../../routes/genero/destroy.php?id=${id}`, { method: "DELETE" })
        .then(() => cargarGeneros());
}

function editarGenero(id, nombre) {
    document.getElementById("generoId").value = id;
    document.getElementById("nombre").value = nombre;
}
