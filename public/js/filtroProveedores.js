let _token = document.getElementById("token").value;

let selectServicios = document.getElementById("f_servicio");

selectServicios.addEventListener("change", obtenerServicio);

function obtenerServicio() {
    const idServicio = selectServicios.value;
    buscarServicios(idServicio);
}

function buscarServicios(idServicio) {
    var data = {
        id: idServicio,
    };

    fetch("/cliente/buscar", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": _token,
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            console.log(response.total);

            if (response.total <= 0) {
                alertas(3, "Sin resultados");
                return;
            }

            alertas(1, "Proveedores encontrados");

            $("#subcont").remove();
            document
                .querySelectorAll(".proveedores")
                .forEach(function (elemento) {
                    elemento.remove();
                });

            let res = response.proveedores;
            res.forEach(function (proveedor) {

                var starsHTML = "";
                if (proveedor.estrellas > 0) {
                    for (var i = 0; i < proveedor.estrellas; i++) {
                        starsHTML +=
                            '<span class="bi bi-star-fill text-warning"></span>';
                    }
                    for (var i = 0; i < 5 - proveedor.estrellas; i++) {
                        starsHTML +=
                            '<span class="bi bi-star-fill text-secondary"></span>';
                    }
                }
                var card =
                    '<div class="col mb-5 proveedores">' +
                    '<div class="card card-inm">' +
                    '<img class="card-img-top img-fluid" src="/' +
                    proveedor.logotipo +
                    '" alt="Proveedor Logo" />' +
                    '<div class="card-body p-3"><hr>' +
                    '<div class="text-center">' +
                    '<h5 class="fw-bolder">' +
                    proveedor.nombreComercial +
                    "</h5>" +
                    proveedor.descripcionServicio +
                    "</div>" +
                    '<div class="text-center">' +
                    starsHTML +
                    "</div>" +
                    "</div>" +
                    '<div class="card-footer p-4 border-top-0 bg-transparent">' +
                    '<div class="text-center"><a class="btn btn-outline-primary mt-auto" href="ver/proveedor/' +
                    proveedor.id +
                    '">Ver información</a>' +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>";
                $("#cardsaqui").append(card);
            });
        })
        .catch((error) => console.error("Error:", error));
}
