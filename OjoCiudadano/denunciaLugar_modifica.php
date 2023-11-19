<?php
    //Se recupera sesion
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
    //Se recupera variable
    $idDenuncia = $_REQUEST['ID'];
    //Conexión base de datos
    require "db.php";
    $conexion = new Conexion();
    $sql = "SELECT * FROM denuncia_lugar WHERE id_denuncialugar = '$idDenuncia'";
    $con = $conexion->ConexionBD();
    $res = $con->query($sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    //Recuperar datos
    if($row){
        $calle = $row["calle"];
        $numero_int = $row["numero_int"];
        $numero_ext = $row["numero_ext"];
        $caracteristicas = $row["caracteristicas"];
        $municipio_lugar = $row["municipio_lugar"];
        $estado_lugar = $row["estado_lugar"];
        $desc_hechos = $row["desc_hechos"];
        $fecha_hechos = $row["fecha_hechos"];
        $hora_hechos = $row["hora_hechos"];
    }
?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="es-mx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Denuncias</title>
    <meta name="description" content="Proyecto final de BD">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="assets/css/formularios.css">
    <link rel="icon" href="assets/img/ojociudadanoVec.png" type="image/png">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/funcionesActualizarLugares.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
                    <p style="text-align: justify;">Bienvenido al Panel de Denuncias de lugares, Administrador. Este espacio te permite revisar de manera eficiente y segura las denuncias específicas relacionadas con lugares señalados en actividades vinculadas al narcotráfico.&nbsp;</p>
                </div>
            </div>
        </div>
    </header>
    <section class="position-relative py-4 py-xl-5">
        <h2 class="text-center mb-4">Actualización de registros&nbsp;</h2>
        <div class="container d-flex justify-content-center" style="margin-bottom: 2%;">
            <div class="d-flex justify-content-around" style="width: 60%;"><input type="text" name="idDenuncia" id="idDenuncia" style="display: none;" value="<?php echo $idDenuncia;?>"></div>
        </div>
        <div class="container position-relative" id="formulario2-actualizar">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-8 col-xxl-9">
                    <div class="card mb-5" style="height: 100%;">
                        <div class="card-body p-sm-5" style="width: 100%;">
                            <h2 class="text-center mb-4">Completa los datos</h2>
                            <form method="post">
                                <div class="d-flex flex-column align-items-center"><label class="form-label">Domicilio</label>
                                    <div class="d-flex d-xxl-flex justify-content-around align-items-xxl-center mb-3" style="width: 100%;"><input class="form-control" type="text" id="calle" name="calle" placeholder="Calle" style="width: 50%;margin: 5px;" required="" value="<?php echo $calle;?>"><input class="form-control" type="text" id="numero_int" name="interior" placeholder="No. Interior" style="width: 25%;margin: 5px;" value="<?php echo $numero_int;?>"><input class="form-control" type="text" id="numero_ext" name="exterior" placeholder="No. Exterior" style="width: 25%;margin: 5px;" required="" value="<?php echo $numero_ext;?>"></div>
                                </div>
                                <div class="mb-3"><textarea class="form-control" id="caracteristicas" name="desc_domicilio" rows="2" placeholder="Características del domicilio" required="" style="resize: none;"><?php echo $caracteristicas;?></textarea></div>
                                <div class="d-flex flex-column align-items-center"><label class="form-label">Lugar</label>
                                    <div class="d-flex d-xxl-flex justify-content-around align-items-xxl-center mb-3"><input class="form-control" type="text" id="estado_lugar" name="estado" placeholder="Estado" style="width: 48%;margin: 5px;" required="" value="<?php echo $estado_lugar;?>"><input class="form-control" type="text" id="municipio_lugar" name="municipio" placeholder="Municipio" style="width: 48%;margin: 5px;" required="" value="<?php echo $municipio_lugar;?>"></div>
                                </div>
                                <div class="mb-3"><textarea class="form-control" id="desc_hechos" name="desc_hechos" rows="2" placeholder="Descripción de los hechos" required="" style="resize: none;"><?php echo $desc_hechos;?></textarea></div>
                                <div class="d-flex flex-column align-items-center" style="margin-bottom: 2%;"><label class="form-label">Fecha de los acontecimientos</label>
                                    <div class="d-flex d-xxl-flex justify-content-around mb-3" style="margin-right: -2px;padding-right: 0px;width: 50%;"><input class="form-control" type="date" style="width: 48%;" required="" name="fecha" id="fecha_hechos" value="<?php echo $fecha_hechos;?>"><input class="form-control" type="time" style="width: 48%;" required="" name="hora" id="hora_hechos" value="<?php echo $hora_hechos;?>"></div>
                                </div>
                                <div><button class="btn btn-primary d-block w-100" data-bss-hover-animate="pulse" onclick="actualizarLugar(event)" type="submit">Actualizar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center bg-dark">
        <div class="container text-white py-4 py-lg-5"><a class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="background: url(&quot;assets/img/googlelogo.png&quot;) no-repeat;background-size: contain;padding: 12px;border-style: none;" href="#"></a>
            <p class="text-muted mb-0" style="color: var(--bs-body-bg);"><span style="color: rgba(255, 255, 255, 0.75);">Este es un proyecto escolar</span></p>
            <p class="text-muted mb-0" style="color: var(--bs-body-bg);"><strong><span style="color: rgba(255, 255, 255, 0.75);">Copyright © 2023 Ojo Ciudadano</span></strong></p>
        </div>
    </footer>
</body>
</html>