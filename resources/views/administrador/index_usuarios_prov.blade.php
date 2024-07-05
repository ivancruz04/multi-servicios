@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
<h1>Usuarios Proveedores</h1>
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
                        <table class="table table-condensed table-hover" id="tabla_proveedores">
                            <thead class="table-primary">
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Servicio</th>
                                <th>RFC</th>
                                <th>Telefono</th>
                                <th>Estatus</th>
                                <th>Calificación</th>
                                <th>Acciónes</th>
                            </thead>
                            <tbody>
                                @foreach($proveedores as $proveedor)
                                <tr>
                                    <td>{{$proveedor->NAME}}</td>
                                    <td>{{$proveedor->email}}</td>
                                    <td>{{$proveedor->nombreServicio}}</td>
                                    <td>{{$proveedor->rfc}}</td>
                                    <td>{{$proveedor->telefono}}</td>
                                    @if($proveedor->estatus == 1)
                                    <td class="text-center"><span class="badge badge-success">Activo</span></td>
                                    @else
                                    <td class="text-center"><span class="badge badge-secondary">Suspendido</span></td>
                                    @endif
                                    <td>
                                        @if($proveedor->calificacion < 1) @for($i=0; $i < 5; $i++) 
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
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-default" type="button" href="{{ url('admin/proveedor',['idUsuario' => $proveedor->id])}}"><i class="bi bi-eye-fill"></i></a>
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
    $('#tabla_proveedores').DataTable();
</script>

@stop