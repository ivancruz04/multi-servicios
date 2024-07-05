@extends('adminlte::page')

@section('title', 'Responder Cotización')

@section('content_header')
<h1>Responder Cotización</h1>
@stop

@section('content')
@foreach($cotizaciones as $cotizacion)
<div class="container-fluid">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cotización</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <div class="text-center">
                                @if($cotizacion->idEstatus == 1)
                                <h5 class=" bg-primary">{{$cotizacion->descripcionEstatus}}</h5>
                                @elseif($cotizacion->idEstatus == 2)
                                <h5 class="bg-success">{{$cotizacion->descripcionEstatus}}</h5>
                                @elseif($cotizacion->idEstatus == 3)
                                <h5 class="bg-success">{{$cotizacion->descripcionEstatus}}</h5>
                                @elseif($cotizacion->idEstatus == 5)
                                <h5 class="bg-primary">{{$cotizacion->descripcionEstatus}}</h5>
                                @else
                                <h5 class="bg-danger">{{$cotizacion->descripcionEstatus}}</h5>
                                @endif
                            </div><br>
                            <div class="form-group row">
                                <label for="c_nombre" class="col-sm-2 col-form-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled id="c_nombre" value="{{$cotizacion->nombreCotizacion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" disabled id="c_descripcion">{{$cotizacion->descripcionCotizacion}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_fecha" class="col-sm-2 col-form-label">Para cuando?</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" disabled id="c_fecha" value="{{$cotizacion->fecha}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_direccion" class="col-sm-2 col-form-label">Donde?</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled id="c_direccion" value="{{$cotizacion->direccion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_comentarios" class="col-sm-2 col-form-label">Comentarios:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled id="c_comentarios">{{$cotizacion->comentariosAdicionales}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_nombreCliente" class="col-sm-2 col-form-label">Nombre completo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled id="c_nombreCliente" value="{{$cotizacion->nombreCliente}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_correoCliente" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled id="c_correoCliente" value="{{$cotizacion->correoCliente}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c_telefonoCliente" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled id="c_telefonoCliente" value="{{$cotizacion->telefonoCliente}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="titulo-respuesta text-center">
                        <h5>Escribe una respuesta</h5>
                    </div>
                    <!-- <div id="summernote"></div> -->
                    @if($cotizacion->idEstatus == 5)
                    <textarea name="c_respuesta" disabled id="c_respuesta" class="w-100" cols="3" rows="10">{{$cotizacion->respuesta}}</textarea>

                    @else
                    <textarea name="c_respuesta" id="c_respuesta" class="w-100" cols="3" rows="10"></textarea>
                    @endif
                </div>
            </div>
            <div class="botones text-center">
                @if($cotizacion->idEstatus == 5)
                @else
                <button class="btn btn-primary" onclick="responderCotizacion('{{$cotizacion->id}}')"><i class="bi bi-send-fill"></i><b> Enviar respuesta</b></button>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- <script>
    $('#summernote').summernote({
        placeholder: 'Describa aqui la respuesta a la cotización del cliente.',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']]
        ]
    });
</script> -->
<script src="/js/alertas.js"></script>
<script src="/js/cotizaciones.js"></script>
@stop