@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Usuarios Clientes</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-end">
            <a class="btn btn-primary" type="button" href="/admin/usuarios/nuevoCliente"><i class="bi bi-person-fill-add"></i> Nuevo cliente</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover" id="tabla_clientes">
                            <thead class="table-primary">
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>RFC</th>
                                <th>Telefono</th>
                                <th>Estatus</th>
                                <th>Acciónes</th>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->NAME}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->rfc}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                    @if($cliente->estatus == 1)
                                        <td class="text-center"><span class="badge badge-success">Activo</span></td>
                                    @else
                                        <td class="text-center"><span class="badge badge-secondary">Suspendido</span></td>
                                    @endif

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-default" type="button" href="{{ url('admin/cliente',['idUsuario' => $cliente->id])}}"><i class="bi bi-eye-fill"></i></a>
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
    $('#tabla_clientes').DataTable();
</script>
@stop