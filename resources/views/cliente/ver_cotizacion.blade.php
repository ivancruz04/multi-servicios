@extends('adminlte::page')

@section('title', 'Cotización')

@section('content_header')
<h1>Informacion de la Cotización</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        @foreach($cotizaciones as $cotizacion)
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($cotizacion->logotipo) }}" alt="User profile picture">
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <h3 class="profile-username text-center">{{$cotizacion->nombreComercial}}</h3>
                        <p class="text-center">
                            @if($cotizacion->calificacion < 1) @for($i=0; $i < 5; $i++) <span class="bi bi-star-fill text-secondary"></span>
                                @endfor
                                @else
                                @for($i = 0; $i < $cotizacion->calificacion; $i++)
                                    <span class="bi bi-star-fill text-warning"></span>
                                    @endfor
                                    @for($i = 0; $i < 5 - $cotizacion->calificacion; $i++)
                                        <span class="bi bi-star-fill text-secondary"></span>
                                        @endfor
                                        @endif
                        </p>
                        <p class="text-muted text-center">{{$cotizacion->nombreServicio}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Trabajos realizados</b> <a class="float-right">{{$cotizacion->trabajos}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Años de experiencia</b> <a class="float-right">{{$cotizacion->experiencia}}</a>
                            </li>
                            <!--<li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li> -->
                        </ul>



                    </div>

                </div>

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            @if($cotizacion->idEstatus == 4 || $cotizacion->idEstatus == 1)
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cotización</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cotización</a></li>
                            <li class="nav-item"><a class="nav-link" href="#respuesta" data-toggle="tab">Respuesta</a></li>

                            @endif
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
                                        <input type="text" class="form-control" id="c_nombre" value="{{$cotizacion->nombreCotizacion}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" id="c_descripcion">{{$cotizacion->descripcionCotizacion}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_fecha" class="col-sm-2 col-form-label">Para cuando?</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="c_fecha" value="{{$cotizacion->fecha}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_direccion" class="col-sm-2 col-form-label">Donde?</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_direccion" value="{{$cotizacion->direccion}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_comentarios" class="col-sm-2 col-form-label">Comentarios:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="c_comentarios">{{$cotizacion->comentariosAdicionales}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_nombreCliente" class="col-sm-2 col-form-label">Nombre completo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_nombreCliente" value="{{$cotizacion->nombreCliente}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_correoCliente" class="col-sm-2 col-form-label">Correo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_correoCliente" value="{{$cotizacion->correoCliente}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_telefonoCliente" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="c_telefonoCliente" value="{{$cotizacion->telefonoCliente}}">
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->
                                <div class="form-group row text-center">
                                    <div class="offset-sm-2 col-sm-10">
                                        @if($cotizacion->idEstatus == 1)
                                        <button class="btn btn-danger" onclick="cerrarCotizacion('{{$cotizacion->id}}')"><b>Cerrar</b></button>
                                        <button class="btn btn-primary" onclick="cotizacionServicio('{{$cotizacion->id}}')"><b>En servicio</b></button>
                                        @elseif($cotizacion->idEstatus == 2)
                                        <button class="btn btn-danger" onclick="cerrarCotizacion('{{$cotizacion->id}}')"><b>Cerrar</b></button>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modalCalificacion"><b>Servicio completado</b></button>
                                        @elseif($cotizacion->idEstatus == 3)
                                        <h3 class="bg-success">Servicio completado</h3>
                                        @elseif($cotizacion->idEstatus == 5)
                                        <button class="btn btn-danger" onclick="cerrarCotizacion('{{$cotizacion->id}}')"><b>Cerrar</b></button>
                                        <button class="btn btn-primary" onclick="cotizacionServicio('{{$cotizacion->id}}')"><b>En servicio</b></button>
                                        @else
                                        <h3 class="bg-danger">Cotización cerrada</h3>

                                        @endif
                                    </div>
                                </div>

                            </div>
                            @if($cotizacion->idEstatus == 4 || $cotizacion->idEstatus == 1)
                            
                            @else
                            <div class="tab-pane active" id="respuesta">         
                                    <textarea class="w-100" cols="3" rows="10">{{$cotizacion->respuesta}}</textarea>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<div class="modal fade" id="modalCalificacion" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Califica el servicio de {{$cotizacion->nombreComercial}}</h4>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="rating">
                            <p>Calificación:</p>
                            <div class="star-rating">
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5"><i class="fas fa-star"></i></label>
                            </div>
                            <div class="star-rating">
                                <span>Malo</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="star1">1 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="star2">2 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="star3">3 </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="star4">4 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="star5">5 </label>&nbsp;&nbsp;&nbsp;
                                <span>Excelente</span>
                            </div>

                            <div class="text-start">
                                <p>Escribe un comentario:</p>
                            </div>
                            <textarea name="c_comentario" id="c_comentario" class="w-100" cols="3" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" onclick="cotizacionTerminada('{{$cotizacion->id}}')" class="btn btn-default" data-dismiss="modal">Terminar sin calificar</button>
                <button type="button" onclick="cotizacionTerminadaConCalificacion('{{$cotizacion->id}}', '{{$cotizacion->idProveedor}}', '{{$cotizacion->idCliente}}')" class="btn btn-primary">Enviar calificación</button>

            </div>
        </div>
    </div>
</div>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="/css/calificacion.css">
@stop

@section('js')
<script src="/js/alertas.js"></script>
<script src="/js/cotizaciones.js"></script>
@stop