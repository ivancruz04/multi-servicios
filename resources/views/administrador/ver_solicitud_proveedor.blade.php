@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
<h1>Revisa la solicitud</h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">Datos del proveedor</h3>
                </div>
                <div class="card-body">
                    @foreach($datos as $dato)
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <img class="img-fluid" src="{{asset($dato->logotipo)}}" width="40%" height="40%" alt="logo proveedor">
                            </div>
                            <div class="col-md-4">
                                <label for="p_nombre" class="form-label">Nombre Completo</label>
                                <input disabled type="text" id="p_nombre" value="{{$dato->NAME}}" name="p_nombre" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_correo" class="form-label">Correo Electronico</label>
                                <input disabled type="text" id="p_correo" value="{{$dato->email}}" name="p_correo" class="form-control" required>
                                <!-- <label for="interes" class="form-label">Interes</label>
                                                <select class="form-select" id="interes" name="select_interes" aria-label="Default select example" required>
                                                    <option value="0">Comprar</option>
                                                    <option value="1">Vender</option>
                                                    <option value="2">Rentar</option>
                                                    <option value="3">Arrendar</option>

                                                </select> -->
                            </div>
                            <!-- <div class="col-md-4">
                                <label for="p_contraseña" class="form-label">Contraseña</label>
                                <input disabled type="password" id="p_contraseña" name="p_contraseña" class="form-control" required>
                            </div> -->

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="p_descripcion" class="form-label">Describe tu servicio</label>
                                <textarea disabled type="text" id="p_descripcion" rows="1" name="p_descripcion" class="form-control">{{$dato->descripcionProveedor}}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="p_telefono" class="form-label">telefono</label>
                                <input disabled type="text" id="p_telefono" value="{{$dato->telefono}}" name="p_telefono" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_servicio" class="form-label">Servicio</label>
                                <select disabled class="form-select" id="p_servicio" name="p_servicio" aria-label="" required>
                                    <option value="{{$dato->idServicio}}">{{$dato->nombreServicio}}</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="p_rfc" class="form-label">RFC</label>
                                <input disabled type="text" id="p_rfc" value="{{$dato->rfc}}" name="p_rfc" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_razonSocial" class="form-label">Razon Social</label>
                                <input disabled type="text" id="p_razonSocial" value="{{$dato->razonSocial}}" name="p_razonSocial" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_nombreComercial" class="form-label">Nombre comercial</label>
                                <input disabled type="text" id="p_nombreComercial" value="{{$dato->nombreComercial}}" name="p_nombreComercial" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="p_paginaWeb" class="form-label">Pagina Web</label>
                                <input disabled type="text" id="p_paginaWeb" name="p_paginaWeb" value="{{$dato->paginaWeb}}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="p_facebook" class="form-label">Facebook</label>
                                <input disabled type="text" id="p_facebook" name="p_facebook" value="{{$dato->facebook}}" class="form-control" required>
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
                                <input disabled type="text" id="p_calle" name="p_calle" value="{{$dato->calle}}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_numeroExt" class="form-label">Numero</label>
                                <input disabled type="text" id="p_numeroExt" name="p_numeroExt" value="{{$dato->numeroExterior}}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_colonia" class="form-label">Colonia</label>
                                <input disabled type="text" id="p_colonia" name="p_colonia" value="{{$dato->colonia}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="p_cp" class="form-label">Codigo postal</label>
                                <input disabled type="text" id="p_cp" name="p_cp" class="form-control" value="{{$dato->cp}}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_estado" class="form-label">Estado</label>
                                <input disabled type="text" id="p_estado" name="p_estado" value="{{$dato->estado}}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="p_ciudad" class="form-label">Ciudad</label>
                                <input disabled type="text" id="p_ciudad" name="p_ciudad" value="{{$dato->ciudad}}" class="form-control" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 d-grid gap-2">
                                <div class="btn-group">
                                    <button class="btn btn-lg btn-danger" title="Rechazar solicitud" data-toggle="modal" data-target="#modalRechazo" type="button"><i class="bi bi-x-circle-fill"></i></button>
                                    <button class="btn btn-lg btn-success" title="Aceptar solicitud" onclick="aceptarSolicitudProveedor('{{$dato->id}}')" type="button"><i class="bi bi-check-circle-fill"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRechazo" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Escribe el motivo de rechazo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="p_motivoRechazo" id="p_motivoRechazo" class="w-100" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                @foreach($datos as $dato)
                <button type="button" onclick="rechazarSolicitudProveedor('{{$dato->id}}')" class="btn btn-danger">Rechazar solicitud</button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="/js/alertas.js"></script>
<script src="/js/solicitudes.js"></script>

@stop