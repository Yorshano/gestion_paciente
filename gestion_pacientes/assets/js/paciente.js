document.addEventListener("DOMContentLoaded", function () {
    loadPacientes();
});

function loadPacientes() {
    fetch("../../routes/paciente/index.php")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector("#pacientes tbody");
            tableBody.innerHTML = "";
            data.forEach(paciente => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${paciente.id}</td>
                        <td>${paciente.tipo_documento} - ${paciente.numero_documento}</td>
                        <td>${paciente.nombre1} ${paciente.nombre2}</td>
                        <td>${paciente.apellido1} ${paciente.apellido2}</td>
                        <td>${paciente.genero}</td>
                        <td>${paciente.departamento}</td>
                        <td>${paciente.municipio}</td>
                        <td>${paciente.correo}</td>
                        <td>
                            <button onclick="editPaciente(${paciente.id})">Editar</button>
                            <button onclick="deletePaciente(${paciente.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function savePaciente() {
    let formData = new FormData(document.querySelector("#pacienteForm"));
    fetch("../../routes/paciente/store.php", {
        method: "POST",
        body: formData
    }).then(() => {
        loadPacientes();
        document.querySelector("#pacienteForm").reset();
    });
}

function editPaciente(id) {
    fetch(`../../routes/paciente/show.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.querySelector("#paciente_id").value = data.id;
            document.querySelector("#tipo_documento_id").value = data.tipo_documento_id;
            document.querySelector("#numero_documento").value = data.numero_documento;
            document.querySelector("#nombre1").value = data.nombre1;
            document.querySelector("#nombre2").value = data.nombre2;
            document.querySelector("#apellido1").value = data.apellido1;
            document.querySelector("#apellido2").value = data.apellido2;
            document.querySelector("#genero_id").value = data.genero_id;
            document.querySelector("#departamento_id").value = data.departamento_id;
            document.querySelector("#municipio_id").value = data.municipio_id;
            document.querySelector("#correo").value = data.correo;
        });
}

function deletePaciente(id) {
    if (confirm("¿Eliminar paciente?")) {
        fetch(`../../routes/paciente/destroy.php?id=${id}`)
            .then(() => loadPacientes());
    }
}
