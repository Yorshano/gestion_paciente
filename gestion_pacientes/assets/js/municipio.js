document.addEventListener("DOMContentLoaded", () => {
    cargarMunicipios();
    cargarDepartamentos();

    document.getElementById("formMunicipio").addEventListener("submit", function(event) {
        event.preventDefault();
        let id = document.getElementById("municipioId").value;
        let nombre = document.getElementById("nombre").value;
        let departamento_id = document.getElementById("departamento_id").value;

        if (id) {
            actualizarMunicipio(id, nombre, departamento_id);
        } else {
            crearMunicipio(nombre, departamento_id);
        }
    });
});

function cargarMunicipios() {
    fetch("../../routes/municipio/index.php")
        .then(response => response.json())
        .then(data => {
            let lista = document.getElementById("municipioLista");
            lista.innerHTML = "";
            data.forEach(municipio => {
                lista.innerHTML += `
                    <tr>
                        <td>${municipio.id}</td>
                        <td>${municipio.nombre}</td>
                        <td>${municipio.departamento}</td>
                        <td>
                            <button onclick="editarMunicipio(${municipio.id}, '${municipio.nombre}', ${municipio.departamento_id})">Editar</button>
                            <button onclick="eliminarMunicipio(${municipio.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function cargarDepartamentos() {
    fetch("../../routes/departamento/index.php")
        .then(response => response.json())
        .then(data => {
            let select = document.getElementById("departamento_id");
            select.innerHTML = `<option value="">Seleccione un departamento</option>`;
            data.forEach(depto => {
                select.innerHTML += `<option value="${depto.id}">${depto.nombre}</option>`;
            });
        });
}

function crearMunicipio(nombre, departamento_id) {
    fetch("../../routes/municipio/store.php", {
        method: "POST",
        body: JSON.stringify({ nombre, departamento_id }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarMunicipios();
        document.getElementById("formMunicipio").reset();
    });
}

function actualizarMunicipio(id, nombre, departamento_id) {
    fetch(`../../routes/municipio/update.php?id=${id}`, {
        method: "PUT",
        body: JSON.stringify({ nombre, departamento_id }),
        headers: { "Content-Type": "application/json" }
    }).then(() => {
        cargarMunicipios();
        document.getElementById("formMunicipio").reset();
    });
}

function eliminarMunicipio(id) {
    fetch(`../../routes/municipio/destroy.php?id=${id}`, { method: "DELETE" })
        .then(() => cargarMunicipios());
}

function editarMunicipio(id, nombre, departamento_id) {
    document.getElementById("municipioId").value = id;
    document.getElementById("nombre").value = nombre;
    document.getElementById("departamento_id").value = departamento_id;
}
