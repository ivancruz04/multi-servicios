<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Qwikly</title>

    <link rel="stylesheet" href="/css/preRegistro.css">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <section class="">
        <div class="container">
            <div class="cardhola o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="titulo text-center">
                        <!-- <h1 class="display-6 fw-bolder">Registro de proveedor</h1> -->
                        <a href="/Qwikly/inicio"><img class="img-fluid" height="20%" width="15%" src="/img/navbar-logo.png" alt=""></a>
                    </div>
                    <div class="cajaformulario py-2 px-5">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3 class="card-title">Datos de Cliente</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <label for="p_nombre" class="form-label">Nombre Completo</label>
                                                <input type="text" id="c_nombre" name="c_nombre" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_correo" class="form-label">Correo Electronico</label>
                                                <input type="text" id="c_correo" name="c_correo" class="form-control" required>
                                                <!-- <label for="interes" class="form-label">Interes</label>
                                                <select class="form-select" id="interes" name="select_interes" aria-label="Default select example" required>
                                                    <option value="0">Comprar</option>
                                                    <option value="1">Vender</option>
                                                    <option value="2">Rentar</option>
                                                    <option value="4">Arrendar</option>

                                                </select> -->
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_contraseña" class="form-label">Contraseña</label>
                                                <input type="password" id="c_contraseña" name="c_contraseña" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="p_rfc" class="form-label">RFC</label>
                                                <input type="text" id="c_rfc" name="c_rfc" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="p_telefono" class="form-label">telefono</label>
                                                <input type="text" id="c_telefono" name="c_telefono" class="form-control" required>
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <div class="row py-3">
                                            <div class="col-md-12 text-center">
                                                <p>Datos ubicación</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="p_calle" class="form-label">Calle</label>
                                                <input type="text" id="c_calle" name="c_calle" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_numeroExt" class="form-label">Numero</label>
                                                <input type="text" id="c_numeroExt" name="c_numeroExt" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_colonia" class="form-label">Colonia</label>
                                                <input type="text" id="c_colonia" name="c_colonia" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="p_cp" class="form-label">Codigo postal</label>
                                                <input type="text" id="c_cp" name="c_cp" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_estado" class="form-label">Estado</label>
                                                <input type="text" id="c_estado" name="c_estado" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_ciudad" class="form-label">Ciudad</label>
                                                <input type="text" id="c_ciudad" name="c_ciudad" class="form-control" required>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4 d-grid gap-2">
                                                <button class="btn btn-primary" onclick="recibirDatosCliente()" type="button">Registrarme</button>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>


    <script src="/js/alertas.js"></script>
    <script src="/js/preRegistroProv.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>