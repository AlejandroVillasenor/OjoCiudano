<!DOCTYPE html>
<html data-bs-theme="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Consultas</title>
    <meta name="description" content="Proyecto final de BD">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="assets/css/consultasEstilos.css">
    <link rel="stylesheet" href="/assets/css/formularios.css">
    <link rel="icon" href="assets/img/ojociudadanoVec.png" type="image/png">
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: #00000000;"><img data-bss-hover-animate="pulse" src="assets/img/OJO-CIUDADANOlogo.png" width="64" height="64"></span><span><a href="index.html"><span style="color: rgb(0, 0, 0);">Ojo Ciudadano</span></a></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="denuncia.php"><span style="color: rgba(42, 42, 42, 0.8);">Denuncia</span></a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="instituciones.html">Instituciones</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="consultas.php">Consulta</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="about.html">Acerca de</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="text-center text-white bounce animated masthead" style="background: url(&quot;assets/img/consultasBG.jpg&quot;);background-size: cover;height: 400px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto position-relative">
                    <h1 class="mb-5" style="text-shadow: 0px 0px 20px var(--bs-emphasis-color);text-align: center;"><span style="background-color: rgb(0, 0, 0);">Consulta datos abiertos sobre acciones antidrogas</span></h1>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center bg-light features-icons" style="background: rgb(255,255,255);padding-top: 60px;padding-bottom: 100px;background-size: cover;">
        <div class="container">
            <div style="margin-bottom: 20px;"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-right: 20px;" id="boton1" href="#" onclick="mostrarFormulario1()">Categorías</button><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" id="boton2" href="#" onclick="mostrarFormulario2()">Año y/o mes</button></div>
        </div>
        <div class="container" id="formulario1">
            <div class="card mb-5">
                <div class="card-body p-sm-5">
                    <form method="post">
                        <h4 class="text-center mb-4">Selecciona una categoria</h4>
                        <div class="d-flex flex-column align-items-start align-content-start flex-nowrap justify-content-xxl-center" style="margin-bottom: 1.5%;">
                            <h5 class="text-start justify-content-center" style="text-align: center;">Destrucción de cultivos de:</h5>
                            <div class="d-flex d-lg-flex justify-content-around justify-content-lg-center" style="width: 100%;">
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Amapola</label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Marihuana</label></div>
                            </div><span class="text-start" style="width: 100%;margin-top: 0.5%;">(Unidad de medida: hectáreas)</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start">
                            <h5 class="text-start justify-content-center">Aseguramiento de:</h5>
                            <div class="d-grid d-lg-flex flex-column justify-content-around justify-content-lg-center" style="width: 100%;">
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-13"><label class="form-check-label" for="formCheck-13"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Cocaína</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-14"><label class="form-check-label" for="formCheck-14" style="width: 250px;">Estimulantes de tipo anfetamínico.</label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-15"><label class="form-check-label" for="formCheck-15"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Fentanilo</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-16"><label class="form-check-label" for="formCheck-16" style="width: 100px;"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Goma de opio</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-17"><label class="form-check-label" for="formCheck-17"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Heroína</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-18"><label class="form-check-label" for="formCheck-18"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Marihuana</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-19"><label class="form-check-label" for="formCheck-19" style="width: 150px;"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Semilla de marihuana</span></label></div>
                                <div class="form-check text-start" style="width: 50%;"><input class="form-check-input" type="checkbox" id="formCheck-20"><label class="form-check-label" for="formCheck-20" style="width: 150px;"><span style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255);">Semilla de amapola</span></label></div>
                                <section></section>
                            </div><span style="margin-top: 0.5%;">(Unidad de medida: Kilogramos)</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" id="formulario2">
            <div class="row d-flex justify-content-center align-items-center align-content-center">
                <div class="col" style="max-height: 100%;">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h4 class="text-center mb-4">Búsqueda por año y/o mes</h4>
                            <form method="post">
                                <div class="d-flex d-lg-flex flex-column justify-content-center align-items-center flex-nowrap" style="width: 100%;margin-bottom: 10%;"><select class="form-select" style="width: 50%;margin-top: 20px;">
                                    <optgroup label="Selecciona el año">
                                        <option value="2022" selected="">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                    </optgroup>
                                    </select><select class="form-select d-xl-flex justify-content-xl-start" style="width: 50%;margin-top: 10px;">
                                        <optgroup label="Selecciona el mes/anual">
                                            <option value="13" selected="">Anual</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </optgroup>
                                    </select>
                                    <div style="width: 50%;"><button class="btn btn-primary d-xl-flex justify-content-xl-center d-block w-100" data-bss-hover-animate="pulse" type="submit" style="margin-top: 8%;">Enviar</button></div>
                                </div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var boton1 = document.getElementById("boton1");
            var boton2 = document.getElementById("boton2");
            var formulario1 = document.getElementById("formulario1");
            var formulario2 = document.getElementById("formulario2");

            boton1.addEventListener("click", function() {
                formulario2.style.display = "none";
                formulario1.style.display = "block";
            });

            boton2.addEventListener("click", function() {
                formulario1.style.display = "none";
                formulario2.style.display = "block";
            });
        });
    </script>
</body>

</html>