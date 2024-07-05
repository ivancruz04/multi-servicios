let _token = document.getElementById("token").value;

function recibirDatosCotizacion(idProveedor, emailProveedor, nombreComercial) {
    const c_nombre = document.getElementById("c_nombre").value;
    const c_descripcion = document.getElementById("c_descripcion").value;
    const c_fecha = document.getElementById("c_fecha").value;
    const c_direccion = document.getElementById("c_direccion").value;
    const c_comentarios = document.getElementById("c_comentarios").value;
    const c_nombreCliente = document.getElementById("c_nombreCliente").value;
    const c_correoCliente = document.getElementById("c_correoCliente").value;
    const c_telefonoCliente =
        document.getElementById("c_telefonoCliente").value;

    if (
        c_nombre == "" ||
        c_descripcion == "" ||
        c_fecha == "" ||
        c_direccion == "" ||
        c_nombreCliente == "" ||
        c_correoCliente == "" ||
        c_telefonoCliente == ""
    ) {
        alertas(3, "Por favor llenar los campos obligatorios");
        return;
    }

    var data = {
        nombreCotizacion: c_nombre,
        descripcion: c_descripcion,
        fecha: c_fecha,
        direccion: c_direccion,
        comentariosAdicionales: c_comentarios,
        idProveedor: idProveedor,
        nombreCliente: c_nombreCliente,
        correoCliente: c_correoCliente,
        telefonoCliente: c_telefonoCliente,
        emailProveedor: emailProveedor,
        nombreComercial: nombreComercial,
    };

    registrarCotizacion(data);
}

function registrarCotizacion(data) {
    fetch("/regitrar/cotizacion", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    const ruta = "/cliente/cotizaciones";
                    window.location.href = ruta;
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}

function cerrarCotizacion(idCotizacion) {
    var data = {
        id: idCotizacion,
    };

    fetch("/cotizacion/cancelada", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    // const ruta = "/cliente/cotizaciones";
                    // window.location.href = ruta;
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}

function cotizacionServicio(idCotizacion) {
    var data = {
        id: idCotizacion,
    };

    fetch("/cotizacion/enservicio", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    // const ruta = "/cliente/cotizaciones";
                    // window.location.href = ruta;
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}

function cotizacionTerminada(idCotizacion) {
    var data = {
        id: idCotizacion,
        hay: 0,
    };

    fetch("/cotizacion/terminada", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    // const ruta = "/cliente/cotizaciones";
                    // window.location.href = ruta;
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}

function cotizacionTerminadaConCalificacion(idCotizacion, idProveedor, idCliente) {
    
    // Obtén el valor de la estrella seleccionada
    const estrellaSeleccionada = obtenerEstrellaSeleccionada();

    // Obtén el comentario
    const comentario = document.getElementById("c_comentario").value;

    // console.log("Cotización ID:", idCotizacion);
    // console.log("Estrella seleccionada:", estrellaSeleccionada);
    // console.log("Comentario:", comentario);

    if(estrellaSeleccionada === 0 || comentario === ""){
        alertas(3, "Por favor seleccione una calificación y escriba un comentario")
        return
    }

    var data = {
        id: idCotizacion,
        hay: 1,
        estrellas : estrellaSeleccionada,
        comentario : comentario,
        idProveedor : idProveedor,
        idCliente : idCliente    
    };

    fetch("/cotizacion/terminada", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    // const ruta = "/cliente/cotizaciones";
                    // window.location.href = ruta;
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));

}

function obtenerEstrellaSeleccionada() {
    // Encuentra el radio button de estrella seleccionado
    const estrellas = document.querySelectorAll('.star-rating input[type="radio"]');
    for (const estrella of estrellas) {
        if (estrella.checked) {
            return estrella.value;
        }
    }
    return 0; // Si ninguna está seleccionada
}

function responderCotizacion(idCotizacion){

    
    const respuesta = document.getElementById('c_respuesta').value
    var data = {
        id : idCotizacion,
        respuesta : respuesta
    }

    console.log(data)

    fetch("/proveedor/responder/cotizacion", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            alertas(response.respuesta, response.mensaje);

            if (response.respuesta === 1) {
                // Redirigir después de 2 segundos
                setTimeout(function () {
                    // const ruta = "/cliente/cotizaciones";
                    // window.location.href = ruta;
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}