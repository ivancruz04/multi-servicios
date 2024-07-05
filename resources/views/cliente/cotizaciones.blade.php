@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
<h1>Mis Cotizaciones</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-end">
            <a class="btn btn-primary" type="button" href="/cliente/proveedores"><i class="bi bi-person-fill-add"></i> Nuevo cotizacion</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover" id="tabla_cotizaciones">
                            <thead class="table-primary">
                                <th>Nombre</th>
                                <th>Para cuando</th>
                                <th class="text-center">Estatus</th>
                                <th>Proveedor</th>
                                <th>Acciónes</th>
                            </thead>
                            <tbody>
                                @foreach($cotizaciones as $cotizacion)
                                <tr>
                                    <td>{{$cotizacion->nombreCotizacion}}</td>
                                    <td>{{$cotizacion->fecha}}</td>
                                    @if($cotizacion->idEstatus == 1)
                                        <td class="text-center"><span class="badge badge-primary">{{$cotizacion->descripcionEstatus}}</span></td>
                                        @elseif($cotizacion->idEstatus == 2)
                                        <td class="text-center"><span class="badge badge-success">{{$cotizacion->descripcionEstatus}}</span></td>
                                        @elseif($cotizacion->idEstatus == 3)
                                        <td class="text-center"><span class="badge badge-success">{{$cotizacion->descripcionEstatus}}</span></td>
                                        @elseif($cotizacion->idEstatus == 5)
                                        <td class="text-center"><span class="badge badge-primary">{{$cotizacion->descripcionEstatus}}</span></td>
                                        @else
                                        <td class="text-center"><span class="badge badge-danger">{{$cotizacion->descripcionEstatus}}</span></td>
                                    @endif
                                    <td>{{$cotizacion->nombreProveedor}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-default" type="button" href="{{ url('cliente/ver/cotizacion',['idCotizacion' => $cotizacion->id])}}"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
<script>
    $('#tabla_cotizaciones').DataTable();
</script>
@stop