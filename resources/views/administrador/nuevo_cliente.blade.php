@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1>Nuevo cliente</h1>
@stop

@section('content')

<section class="">
        <div class="container">
            <div class="o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
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
                                                <button class="btn btn-primary" onclick="recibirDatosCliente()" type="button">Registrar</button>
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




@stop

@section('css')

@stop

@section('js')
<script src="/js/alertas.js"></script>
<script src="/js/clientes.js"></script>

@stop