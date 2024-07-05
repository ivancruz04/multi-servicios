let _token = document.getElementById("token").value;

function recibirDatosCliente() {
    const c_nombre = document.getElementById("c_nombre").value;
    const c_correo = document.getElementById("c_correo").value;
    const c_contrasena = document.getElementById("c_contraseña").value;
    const c_telefono = document.getElementById("c_telefono").value;
    const c_rfc = document.getElementById("c_rfc").value;
    const c_calle = document.getElementById("c_calle").value;
    const c_numeroExt = document.getElementById("c_numeroExt").value;
    const c_colonia = document.getElementById("c_colonia").value;
    const c_cp = document.getElementById("c_cp").value;
    const c_estado = document.getElementById("c_estado").value;
    const c_ciudad = document.getElementById("c_ciudad").value;

    if (
        c_nombre === "" ||
        c_correo === "" ||
        c_contraseña === "" ||
        c_telefono === ""
    ) {
        alertas(3, "Debe llenar los campos obligatorios");
        return;
    }

    const formData = new FormData();

    formData.append("nombre", c_nombre);
    formData.append("correo", c_correo);
    formData.append("contrasena", c_contrasena);
    formData.append("telefono", c_telefono);
    formData.append("rfc", c_rfc);
    formData.append("calle", c_calle);
    formData.append("numeroExt", c_numeroExt);
    formData.append("colonia", c_colonia);
    formData.append("cp", c_cp);
    formData.append("estado", c_estado);
    formData.append("ciudad", c_ciudad);

    preRegistrarCliente(formData);
}

function preRegistrarCliente(formData) {
    console.log("Datos del cliente:");
    for (let pair of formData.entries()) {
        console.log(pair[0] + ": " + pair[1]);
    }

    fetch("/admin/usuarios/registrarCliente", {
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
                    const ruta = "/admin/usuarios/clientes";
                    window.location.href = ruta;
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}

function enviarNotificacion(idUsuario) {
    const c_nombre = document.getElementById("c_nombre").value;
    const c_correo = document.getElementById("c_correo").value;
    const c_mensaje = document.getElementById("c_mensaje").value;

    var data = {
        idUsuario: idUsuario,
        nombre: c_nombre,
        correo: c_correo,
        mensaje: c_mensaje,
    };

    console.log(data);

    fetch("/admin/notificacion/cliente", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
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
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}

function activarCliente(idUsuario) {
    var data = {
        idUsuario: idUsuario,
    };

    fetch("/admin/activar/cliente", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
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
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}

function suspenderCliente(idUsuario) {
    var data = {
        idUsuario: idUsuario,
    };

    fetch("/admin/suspender/cliente", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
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
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => {
            alertas(2, error);
        });
}
