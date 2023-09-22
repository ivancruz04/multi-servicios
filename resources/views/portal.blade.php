<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Qwikly - Bienvenido</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="" href="#page-top"><img src="/img/navbar-logo.png" width="20%" height="20%" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#proveedores">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                    <a class="btn btn-primary" href="/login">Ingresar</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Bienvenido a Qwikly!</div>
            <div class="masthead-heading text-uppercase">Encontrar un servicio es más rápido</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Descubrir servicios</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Servicios</h2>
                <h3 class="section-subheading text-muted">Se muestran los servicios más destacados</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> -->
                        <img src="/img/soldador.png" width="70%" height="90%" alt="">
                    </span>
                    <h4 class="my-3">Soldadura</h4>
                    <p class="text-muted">Soldadura en general y trabajos de herreria de cualquier tipo.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i> -->
                        <img src="/img/electricista.png" width="80%" height="95%" alt="">

                    </span>
                    <h4 class="my-3">Electricidad</h4>
                    <p class="text-muted">Instalaciones electricas, mantenimiento preventivo, acometidas, correcciones y
                        más.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i> -->
                        <img src="/img/albanil.png" width="80%" height="100%" alt="">

                    </span>
                    <h4 class="my-3">Construcción</h4>
                    <p class="text-muted">Trabajos de albañileria, remodelacion de vivienda u oficina, local comercial,
                        baño, cocina, etc. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-light" id="proveedores">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros Proveedores</h2>
                <h3 class="section-subheading text-muted">Se muestran los proveedores con mejor calificacion</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal1">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/1.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 1</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal2">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/2.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 2</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal3">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/3.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 3</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal4">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/4.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 4</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">

                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal5">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/5.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 5</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">

                    <div class="proveedores-item">
                        <a class="proveedores-link" data-bs-toggle="modal" href="#proveedoresModal6">
                            <div class="proveedores-hover">
                                <div class="proveedores-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/img/proveedores/6.jpg" alt="..." />
                        </a>
                        <div class="proveedores-caption">
                            <div class="proveedores-caption-heading">Proveedor 6</div>
                            <div class="proveedores-caption-subheading text-muted">descripcion corta</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="masthead">
        <div class="container px-5" id="about">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Encuentra un servicio Qwikly.</h1>
                        <p class="lead text-muted mb-5">En nuestro portal puedes solicitar u ofrecer un servicio facil y rapido!... Comienza ahora para satisfacer tus necesidades.</p>
                        <div class="d-flex flex-column flex-lg-row align-items-between">
                            <a class="btn btn-primary btn-md" href="/login">Ingresar</a>
                            <a class="btn btn-primary btn-md" href="#services">Registrarme</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column flex-lg-row align-items-center">
                    <img class="img-fluid" src="/img/trabajos.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contactanos</h2>
                <h3 class="section-subheading text-muted">Envianos un mensaje y nos ponemos en contacto</h3>
            </div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">

                            <input class="form-control" id="name" type="text" placeholder="Tu Nombre *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Tu nombre es requerido.</div>
                        </div>
                        <div class="form-group">

                            <input class="form-control" id="email" type="email" placeholder="Tu Correo Electronico *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">El correo electronico es
                                requerido.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Correo electronico no válido.
                            </div>
                        </div>
                        <div class="form-group mb-md-0">

                            <input class="form-control" id="phone" type="tel" placeholder="Tu Telefono *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Numero de telefono
                                requerido.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">

                            <textarea class="form-control" id="message" placeholder="Tu mensaje *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Mensaje obligatorio.</div>
                        </div>
                    </div>
                </div>

                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Mensaje enviado con exito!!</div>

                        <br />
                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>

                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error al enviar mensaje!</div>
                </div>

                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Enviar Mensaje</button></div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Qwikly 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Politicas de privacidad</a>
                    <a class="link-dark text-decoration-none" href="#!">Terminos de Uso</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- proveedores Modals-->

    <div class="proveedores-modal modal fade" id="proveedoresModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/1.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

                                <ul class="list-inline">

                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="proveedores-modal modal fade" id="proveedoresModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/2.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Categoria
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="proveedores-modal modal fade" id="proveedoresModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/3.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Categoria
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="proveedores-modal modal fade" id="proveedoresModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/4.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Categoria
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="proveedores-modal modal fade" id="proveedoresModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/5.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Categoria
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="proveedores-modal modal fade" id="proveedoresModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">

                                <h2 class="text-uppercase">Nombre proveedor</h2>
                                <p class="item-intro text-muted">Descripcion corta del proveedor.</p>
                                <img class="img-fluid d-block mx-auto" src="/img/proveedores/6.jpg" alt="..." />
                                <p>En este texto se mostrara la informacion o descripcion del proveedor seleccionado</p>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Calificacion:</strong>
                                        9.5/10
                                    </li>
                                    <li>
                                        <strong>Categoria de servicio:</strong>
                                        Categoria
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>