let _token = document.getElementById("token").value;

function aceptarSolicitudProveedor(idUsuario) {

    const p_name = document.getElementById("p_nombre").value;
    const p_email = document.getElementById("p_correo").value;

    var data = {
        idUsuario: idUsuario,
        name : p_name,
        email : p_email
    };

    fetch("/admin/aceptarSolicitud/proveedor", {
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
                    const ruta = "/admin/solicitudes/proveedores";
                    window.location.href = ruta;
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}

function rechazarSolicitudProveedor(idUsuario) {

    const p_name = document.getElementById("p_nombre").value;
    const p_email = document.getElementById("p_correo").value;
    const p_motivoRechazo = document.getElementById("p_motivoRechazo").value;
    

    var data = {
        idUsuario: idUsuario,
        name : p_name,
        email : p_email,
        motivo : p_motivoRechazo 
    };

    console.log('correo')
    console.log(data)

    fetch("/admin/rechazarSolicitud/proveedor", {
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
                    const ruta = "/admin/solicitudes/proveedores";
                    window.location.href = ruta;
                }, 2000); // 2000 milisegundos = 2 segundos
            }
        })
        .catch((error) => console.error("Error:", error));
}
