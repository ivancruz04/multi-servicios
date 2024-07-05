let _token = document.getElementById("token").value;

let selectServicio = document.getElementById("p_servicio");
selectServicio.addEventListener("change", () => {
    const servicioSeleccionado = selectServicio.value;

    if (servicioSeleccionado == "o") {
        alertas(4, "Escribe un resumen de tu servicio en el campo Descripción");
    }
});

function recibirDatosProveedor() {
    const p_nombre = document.getElementById("p_nombre").value;
    const p_correo = document.getElementById("p_correo").value;
    const p_contrasena = document.getElementById("p_contraseña").value;
    const p_servicio = document.getElementById("p_servicio").value;
    const p_descripcion = document.getElementById("p_descripcion").value;
    const p_telefono = document.getElementById("p_telefono").value;
    const p_logotipo = document.querySelector('input[type="file"]').files[0];
    const p_rfc = document.getElementById("p_rfc").value;
    const p_razonSocial = document.getElementById("p_razonSocial").value;
    const p_nombreComercial =
        document.getElementById("p_nombreComercial").value;
    const p_paginaWeb = document.getElementById("p_paginaWeb").value;
    const p_facebook = document.getElementById("p_facebook").value;
    const p_calle = document.getElementById("p_calle").value;
    const p_numeroExt = document.getElementById("p_numeroExt").value;
    const p_colonia = document.getElementById("p_colonia").value;
    const p_cp = document.getElementById("p_cp").value;
    const p_estado = document.getElementById("p_estado").value;
    const p_ciudad = document.getElementById("p_ciudad").value;

    if (
        p_nombre === "" ||
        p_correo === "" ||
        p_contraseña === "" ||
        p_servicio === "" ||
        p_telefono === ""
    ) {
        alertas(3, "Debe llenar los campos obligatorios");
        return;
    }

    const formData = new FormData();

    formData.append("nombre", p_nombre);
    formData.append("correo", p_correo);
    formData.append("contrasena", p_contrasena);
    formData.append("servicio", p_servicio);
    formData.append("descripcion", p_descripcion);
    formData.append("telefono", p_telefono);
    formData.append("logotipo", p_logotipo);
    formData.append("rfc", p_rfc);
    formData.append("razonSocial", p_razonSocial);
    formData.append("nombreComercial", p_nombreComercial);
    formData.append("paginaWeb", p_paginaWeb);
    formData.append("facebook", p_facebook);
    formData.append("calle", p_calle);
    formData.append("numeroExt", p_numeroExt);
    formData.append("colonia", p_colonia);
    formData.append("cp", p_cp);
    formData.append("estado", p_estado);
    formData.append("ciudad", p_ciudad);

    preRegistrarProveedor(formData);
}

function preRegistrarProveedor(formData) {
    console.log("Datos del proveedor:");
    for (let pair of formData.entries()) {
        console.log(pair[0] + ": " + pair[1]);
    }

    fetch("/admin/usuarios/registrarProveedor", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.respuesta);
            console.log(response.mensaje);

            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    const ruta = "/admin/usuarios/proveedores";
                    window.location.href = ruta;
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}

function enviarNotificacion(idUsuario){
    const p_nombre = document.getElementById("p_nombre").value;
    const p_correo = document.getElementById("p_correo").value;
    const p_mensaje = document.getElementById("p_mensaje").value;


    var data = {
        idUsuario : idUsuario,
        nombre : p_nombre,
        correo : p_correo,
        mensaje : p_mensaje
    }

    console.log(data)

    fetch("/admin/notificacion/proveedor", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type" : "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.respuesta);
            console.log(response.mensaje);

            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    location.reload()
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });

}

function activarProveedor(idUsuario){
    var data = {
        idUsuario : idUsuario,
    }

    fetch("/admin/activar/proveedor", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type" : "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.respuesta);
            console.log(response.mensaje);

            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    location.reload()
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}

function suspenderProveedor(idUsuario){

    var data = {
        idUsuario : idUsuario,
    }

    fetch("/admin/suspender/proveedor", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type" : "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.respuesta);
            console.log(response.mensaje);

            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    location.reload()
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}