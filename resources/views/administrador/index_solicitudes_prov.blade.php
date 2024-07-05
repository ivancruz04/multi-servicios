@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header') 
<h1>Solicitudes de proveedores</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-end">
            <a class="btn btn-primary" type="button" href="/admin/usuarios/nuevoProveedor"><i class="bi bi-person-fill-add"></i> Nuevo proveedor</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-hover" id="tabla_solicitudes">
                            <thead class="table-primary">
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Servicio</th>
                                <th>RFC</th>
                                <th>Telefono</th>
                                <th>Acciónes</th>
                            </thead>
                            <tbody>
                                @foreach($solicitudes as $solicitud)
                                <tr>
                                    <td>{{$solicitud->NAME}}</td>
                                    <td>{{$solicitud->email}}</td>
                                    <td>{{$solicitud->nombreServicio}}</td>
                                    <td>{{$solicitud->rfc}}</td>
                                    <td>{{$solicitud->telefono}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-default" type="button" href="{{ url('admin/verSolicitud/proveedor',['idUsuario' => $solicitud->id])}}"><i class="bi bi-eye-fill"></i></a>
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
    $('#tabla_solicitudes').DataTable();
</script>

@stop