@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
<h1>Nuevo proveedor</h1>
@stop

@section('content')

<section class="">
    <div class="container">
        <div class=" o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="cajaformulario py-2 px-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="card-title">Datos del proveedor</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <label for="p_nombre" class="form-label">Nombre Completo *</label>
                                            <input type="text" id="p_nombre" name="p_nombre" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="p_correo" class="form-label">Correo Electronico *</label>
                                            <input type="text" id="p_correo" name="p_correo" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="p_contraseña" class="form-label">Contraseña *</label>
                                            <input type="password" id="p_contraseña" name="p_contraseña" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="p_servicio" class="form-label">Servicio *</label>
                                            <select class="form-select" id="p_servicio" name="p_servicio" aria-label="" required>
                                                <option value="">--Selecciona un servicio--</option>
                                                @foreach($servicios as $servicio)
                                                <option value="{{$servicio->id}}">{{$servicio->nombreServicio}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="p_descripcion" class="form-label">Describe su servicio</label>
                                            <textarea type="text" id="p_descripcion" rows="1" name="p_descripcion" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_telefono" class="form-label">telefono *</label>
                                            <input type="text" id="p_telefono" name="p_telefono" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_logotipo" class="form-label">Logotipo</label>
                                            <input class="form-control" type="file" name="p_logotipo" accept="image/*">
                                            <small class="form-text text-muted">formatos admitidos: JPEG, PNG.</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="p_rfc" class="form-label">RFC</label>
                                            <input type="text" id="p_rfc" name="p_rfc" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_razonSocial" class="form-label">Razon Social</label>
                                            <input type="text" id="p_razonSocial" name="p_razonSocial" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_nombreComercial" class="form-label">Nombre comercial</label>
                                            <input type="text" id="p_nombreComercial" name="p_nombreComercial" class="form-control" required>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="p_paginaWeb" class="form-label">Pagina Web</label>
                                            <input type="text" id="p_paginaWeb" name="p_paginaWeb" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="p_facebook" class="form-label">Facebook</label>
                                            <input type="text" id="p_facebook" name="p_facebook" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row py-3">
                                        <div class="col-md-12 text-center">
                                            <p>Datos ubicación</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="p_calle" class="form-label">Calle</label>
                                            <input type="text" id="p_calle" name="p_calle" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_numeroExt" class="form-label">Numero</label>
                                            <input type="text" id="p_numeroExt" name="p_numeroExt" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_colonia" class="form-label">Colonia</label>
                                            <input type="text" id="p_colonia" name="p_colonia" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="p_cp" class="form-label">Codigo postal</label>
                                            <input type="text" id="p_cp" name="p_cp" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_estado" class="form-label">Estado</label>
                                            <input type="text" id="p_estado" name="p_estado" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_ciudad" class="form-label">Ciudad</label>
                                            <input type="text" id="p_ciudad" name="p_ciudad" class="form-control" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4 d-grid gap-2">
                                            <button class="btn btn-primary" onclick="recibirDatosProveedor()" type="button">Registrar</button>
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
<script src="/js/proveedores.js"></script>

@stop