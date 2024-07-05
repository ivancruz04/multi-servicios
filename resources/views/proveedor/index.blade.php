@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<?php
$idquien = Auth::user()->id;
$quien = Auth::user()->name;
$emailquien = Auth::user()->email;

$sesion = [$idquien, $quien, $emailquien];
//var_dump($sesion);
?>
<br>
<div class="row">
    <div class="col-md-8 col-sm-8 col-12">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="card-title">
                    <h2> Hola {{$quien}}!!
                    </h2>
                </h3>
            </div>
            <div class="card-body">
                <blockquote>
                    <h3>Los clientes te estan esperando, ve a tender sus necesidades!!</h3>
                    <small>Revisa tus cotizaciónes y manos a la obra!! <cite title="Source Title"></cite></small>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="card card-default shadow-lg" id="">
            <div class="card-header mx-auto">
                <h3 class="card-title">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid elevation-2" src="{{asset('/img/perfil.gif')}}" width="36%" height="36%" style="display: block; margin: 0 auto;">
                    </div>
                </h3>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body text-center">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: center;">
                        <h5 class="text-center text-bold text-dark">
                            {{ $quien}} |
                            {{ $emailquien}}
                    </font>
                </font>
            </div>
        </div>
    </div>
</div>
@foreach($datos as $dato)
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-default"><i class='bi bi-star-fill'></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Tu calificación</span>
                <ul class="list-unstyled">
                    <li>
                        @if($dato->calificacion < 1) @for($i=0; $i < 5; $i++) <span class="bi bi-star-fill text-secondary"></span>
                            @endfor
                            @else
                            @for($i = 0; $i < $dato->calificacion; $i++)
                                <span class="bi bi-star-fill text-warning"></span>
                                @endfor
                                @for($i = 0; $i < 5 - $dato->calificacion; $i++)
                                    <span class="bi bi-star-fill text-secondary"></span>
                                    @endfor
                                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-check-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Trabajos realizados</span>
                <span class="info-box-number py-1">{{ $dato->trabajos}}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-check-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Cotizaciones</span>
                @foreach($cotizaciones as $cotizacion)
                <span class="info-box-number py-1">{{ $cotizacion->totalCotizaciones}}</span>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fa fa-check-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Cotizaciones Cerradas</span>
                @foreach($cotizacionesCerradas as $cotizacion)
                <span class="info-box-number py-1">{{ $cotizacion->totalCotizacionesCerrada}}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endforeach
@stop

@section('css')

@stop

@section('js')

@stop