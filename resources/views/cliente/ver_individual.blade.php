@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')
<h1>Informacion del proveedor</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        @foreach($proveedores as $proveedor)
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($proveedor->logotipo) }}" alt="User profile picture">
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <h3 class="profile-username text-center">{{$proveedor->nombreComercial}}</h3>
                        <p class="text-center">
                            @if($proveedor->calificacion > 0)
                            @for($i = 0; $i < $proveedor->calificacion; $i++)
                                <span class="bi bi-star-fill text-warning"></span>
                                @endfor
                                @for($i = 0; $i < 5 - $proveedor->calificacion; $i++)
                                    <span class="bi bi-star-fill text-secondary"></span>
                                    @endfor
                                    @endif
                        </p>
                        <p class="text-muted text-center">{{$proveedor->nombreServicio}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Trabajos realizados</b> <a class="float-right">{{$proveedor->trabajos}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Años de experiencia</b> <a class="float-right">{{$proveedor->experiencia}}</a>
                            </li>
                        </ul>
                        <a href="#settings" data-toggle="tab" class=" btn btn-primary btn-block"><b>Cotizar</b></a>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Acerca de</h3>
                    </div>

                    <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación<nav></nav></strong>
                        <p class="text-muted">{{$proveedor->calle}} , #{{$proveedor->numeroExterior}}, {{$proveedor->colonia}}, {{$proveedor->cp}}, {{$proveedor->ciudad}}, {{$proveedor->estado}}</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Descripción</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">{{$proveedor->descripcionProveedor}}</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-user mr-1"></i> Representante</strong>
                        <p class="text-muted">{{$proveedor->NAME}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cotización</a></li>
                            <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Comentarios</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="activity">
                                @foreach($comentarios as $comentario)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('/img/user.png')}}" alt="user image">
                                        <span class="username">
                                            <p class="text-primary">{{$comentario->nombreCliente}}</p>
                                        </span>
                                    </div>
                                    <p>
                                        {{$comentario->comentario}}
                                    </p>
                                </div>
                                @endforeach

                                <!-- <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                        <span class="username">
                                            <a href="#">Sarah Ross</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                    </div>

                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <form class="form-horizontal">
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" placeholder="Response">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-danger">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->


                                <!-- <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                        <span class="username">
                                            <a href="#">Adam Jones</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Posted 5 photos - 5 days ago</span>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                    <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                </div>

                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>
                                    <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                </div> -->

                            </div>

                            <div class="tab-pane active" id="settings">
                                
                                    <div class="form-group row">
                                        <label for="c_nombre" class="col-sm-2 col-form-label">Titulo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="c_nombre" placeholder="Ponle un titulo a la cotización">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" id="c_descripcion" placeholder="Escribe tus necesidades"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_fecha" class="col-sm-2 col-form-label">Para cuando?</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="c_fecha">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_direccion" class="col-sm-2 col-form-label">Donde?</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="c_direccion" placeholder="Escribe la dirección">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_comentarios" class="col-sm-2 col-form-label">Comentarios:</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="c_comentarios" placeholder="Comentarios adicionales"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_nombreCliente" class="col-sm-2 col-form-label">Nombre completo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="c_nombreCliente" placeholder="Escribe nombre completo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_correoCliente" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="c_correoCliente" placeholder="Correo electronico">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="c_telefonoCliente" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="c_telefonoCliente" placeholder="Correo electronico">
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
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button class="btn btn-primary btn-block" onclick="recibirDatosCotizacion('{{$proveedor->id}}', '{{$proveedor->email}}', '{{$proveedor->nombreComercial}}')">Enviar cotización</button>
                                        </div>
                                    </div>
                                    
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        @endforeach
    </div>
</section>

@stop

@section('css')

@stop

@section('js')
<script src="/js/alertas.js"></script>
<script src="/js/cotizaciones.js"></script>
@stop