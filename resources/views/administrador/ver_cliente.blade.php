@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')

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
                                @foreach($datos as $dato)
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <img class="img-fluid" src="{{asset('/img/cliente.png')}}" width="40%" height="40%" alt="logo proveedor">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <label for="p_nombre" class="form-label">Nombre Completo</label>
                                            <input type="text" disabled id="c_nombre" value="{{$dato->NAME}}" name="c_nombre" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_correo" class="form-label">Correo Electronico</label>
                                            <input type="text" disabled id="c_correo" value="{{$dato->email}}" name="c_correo" class="form-control" required>
                                            <!-- <label for="interes" class="form-label">Interes</label>
                                                <select class="form-select" id="interes" name="select_interes" aria-label="Default select example" required>
                                                    <option value="0">Comprar</option>
                                                    <option value="1">Vender</option>
                                                    <option value="2">Rentar</option>
                                                    <option value="4">Arrendar</option>

                                                </select> -->
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="p_rfc" class="form-label">RFC</label>
                                            <input type="text" disabled id="c_rfc" value="{{$dato->rfc}}" name="c_rfc" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="p_telefono" class="form-label">telefono</label>
                                            <input type="text" disabled id="c_telefono" value="{{$dato->telefono}}" name="c_telefono" class="form-control" required>
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
                                            <input type="text" disabled id="c_calle" value="{{$dato->calle}}" name="c_calle" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_numeroExt" class="form-label">Numero</label>
                                            <input type="text" disabled id="c_numeroExt" value="{{$dato->numeroExterior}}" name="c_numeroExt" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_colonia" class="form-label">Colonia</label>
                                            <input type="text" disabled id="c_colonia" value="{{$dato->colonia}}" name="c_colonia" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="p_cp" class="form-label">Codigo postal</label>
                                            <input type="text" disabled id="c_cp" name="c_cp" value="{{$dato->cp}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_estado" class="form-label">Estado</label>
                                            <input type="text" disabled id="c_estado" name="c_estado" value="{{$dato->estado}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="p_ciudad" class="form-label">Ciudad</label>
                                            <input type="text" disabled id="c_ciudad" value="{{$dato->ciudad}}" name="c_ciudad" class="form-control" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4 d-grid gap-2">
                                            <div class="btn-group">
                                                @if($dato->estatus == 1)
                                                <button class="btn btn-lg btn-default" onclick="suspenderCliente('{{$dato->id}}')" title="Suspender"><i class="bi bi-sign-stop-fill"></i></button>
                                                <button class="btn btn-lg btn-primary" title="Enviar notificacion" data-toggle="modal" data-target="#modalMensaje" type="button" type="button"><i class="bi bi-envelope-at-fill"></i></button>
                                                @else
                                                <button class="btn btn-lg btn-success" onclick="activarCliente('{{$dato->id}}')" title="Activar"><i class="bi bi-check-circle-fill"></i></button>
                                                <button class="btn btn-lg btn-primary" title="Enviar notificacion" data-toggle="modal" data-target="#modalMensaje" type="button" type="button"><i class="bi bi-envelope-at-fill"></i></button>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </form>
                            <br>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalMensaje" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enviar notificación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="c_mensaje" placeholder="Escribe un mensaje" id="c_mensaje" class="w-100" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                @foreach($datos as $dato)
                <button type="button" onclick="enviarNotificacion('{{$dato->id}}')" class="btn btn-primary">Enviar</button>
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
<script src="/js/clientes.js"></script>

@stop