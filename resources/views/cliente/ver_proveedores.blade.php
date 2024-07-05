@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
<h1>Proveedores Disponibles</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card">

        <div class="card-body">
            <div class="col-md-12">
                <div class=" row">
                    <div class="col-sm-7">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <label class="form-label" for="">Servicio : </label>
                        <select class="form-select" type="text" name="f_servicio" id="f_servicio">
                            <option value="all">--Todos--</option>
                            @foreach($servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->nombreServicio}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="cardsFiltro">
        <div class="container-flu-id px-4 px-lg-5 mt-5 cardsInmuebles" id="cardsInmuebles">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center cardsaqui" id="cardsaqui">
                @foreach($proveedores as $proveedor)
                <div class="col mb-5 proveedores">
                    <div class="card card-inm">
                        <img class="card-img-top img-fluid" src="{{ asset($proveedor->logotipo) }}" alt="Proveedor Logo" />
                        <div class="card-body p-3"><hr>
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $proveedor->nombreComercial }}</h5>
                                {{ $proveedor->descripcionServicio }}
                            </div>
                            <div class="text-center">
                            @if($proveedor->calificacion < 1)
                                @for($i = 0; $i < 5; $i++)
                                    <span class="bi bi-star-fill text-secondary"></span>
                                @endfor
                            @else
                                @for($i = 0; $i < $proveedor->calificacion; $i++)
                                    <span class="bi bi-star-fill text-warning"></span>
                                @endfor
                                @for($i = 0; $i < 5 - $proveedor->calificacion; $i++)
                                    <span class="bi bi-star-fill text-secondary"></span>
                                @endfor
                            @endif
                            </div>
                        </div>
                        <div class="card-footer p-4 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-primary boton-ver mt-auto" href="{{ url('cliente/ver/proveedor',['idUsuario' => $proveedor->id])}}">Ver información</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>




@stop

@section('css')

@stop

@section('js')
<script src="/js/alertas.js"></script>
<script src="/js/filtroProveedores.js"></script>
@stop