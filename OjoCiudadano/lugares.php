<!DOCTYPE html>
<html data-bs-theme="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Denuncia de lugares</title>
    <meta name="description" content="Proyecto final de BD">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="assets/css/estilosDenunciasAdmin.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/funcionListaLugares.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="assets/img/ojociudadanoVec.png" type="image/png">
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">
    <nav class="navbar navbar-expand-md fixed-top bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: #00000000;"><img data-bss-hover-animate="pulse" src="assets/img/OJO-CIUDADANOlogo.png" width="64" height="64"></span><span><a href="adminIndex.php"><span style="color: rgb(0, 0, 0);">Administrador</span></a></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="imputados.php">Imputados</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="lugares.php">Lugares</a></li>
                </ul><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location.href='includes/logout.php'" >Cerrar sesión</button>
            </div>
        </div>
    </nav>
    <header class="d-block" style="padding: 128px 0 30px 0 ;margin: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <h1 class="pulse animated" style="text-align: center;">Denuncias de lugares</h1>
                    </div>
                    <p style="text-align: justify;">Bienvenido al Panel de Denuncias de lugares sospechosos, Administrador. Aquí encontrarás un resumen detallado de las denuncias vinculadas a lugares sospechosos de actividad relacionada con el narcotráfico. </p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            <div class="col-11 col-md-12 col-xl-12 col-xxl-12" style="width: 100%;">
                    <div class="table-responsive" id="contenedorLugares">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center bg-dark mt-auto">
        <div class="container text-white py-4 py-lg-5"><a class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="background: url(&quot;assets/img/googlelogo.png&quot;) no-repeat;background-size: contain;padding: 12px;border-style: none;" href="#"></a>
            <p class="text-muted mb-0" style="color: var(--bs-body-bg);"><span style="color: rgba(255, 255, 255, 0.75);">Este es un proyecto escolar</span></p>
            <p class="text-muted mb-0" style="color: var(--bs-body-bg);"><strong><span style="color: rgba(255, 255, 255, 0.75);">Copyright © 2023 Ojo Ciudadano</span></strong></p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
</body>

</html>