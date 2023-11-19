<?php
    // Captura de datos
    $tabla = $_GET["tabla"];
    $categoria = $_GET["categoria"];
    $anio = $_GET["anio"];
    $mes = $_GET["mes"];

    // Conexión a la base de datos
    require "db.php";
    $conexion = new Conexion();
    $con = $conexion->ConexionBD();

    if ($tabla === "destruccion") { // Corrección: utiliza === para comparar
        if($mes == 13){
            $sql = $con->prepare("SELECT e.nombre as estado, SUM(d.hectareas) as cantidad
                FROM 
                    Destruccion d
                JOIN 
                    Estado e ON d.id_estado = e.id_estado
                JOIN 
                    Droga dr ON d.id_droga = dr.id_droga
                WHERE 
                    d.anio = :anio 
                    AND dr.nombre = :categoria
                GROUP BY 
                    e.nombre;
            ");
        }else{
            $sql = $con->prepare("SELECT e.nombre as estado, SUM(d.hectareas) as cantidad
                FROM 
                    Destruccion d
                JOIN 
                    Estado e ON d.id_estado = e.id_estado
                JOIN 
                    Droga dr ON d.id_droga = dr.id_droga
                WHERE 
                    d.anio = :anio 
                    AND d.mes = :mes
                    AND dr.nombre = :categoria
                GROUP BY 
                    e.nombre;
            ");
            $sql->bindParam(':mes', $mes, PDO::PARAM_INT);
        }
        
    } else {
        if($mes == 13){
            $sql = $con->prepare("SELECT e.nombre as estado, SUM(a.cantidad) as cantidad
                FROM 
                    Aseguramiento a
                JOIN 
                    Estado e ON a.id_estado = e.id_estado
                JOIN 
                    Droga d ON a.id_droga = d.id_droga
                WHERE 
                    a.anio = :anio 
                    AND d.nombre = :categoria
                GROUP BY 
                    e.nombre;
            ");

        }else{
            $sql = $con->prepare("SELECT e.nombre as estado, SUM(a.cantidad) as cantidad
                    FROM 
                        Aseguramiento a
                    JOIN 
                        Estado e ON a.id_estado = e.id_estado
                    JOIN 
                        Droga d ON a.id_droga = d.id_droga
                    WHERE 
                        a.anio = :anio 
                        AND a.mes = :mes
                        AND d.nombre = :categoria
                    GROUP BY 
                        e.nombre;
            ");
            $sql->bindParam(':mes', $mes, PDO::PARAM_INT);
        }
        
    }

    // Asigna los valores a los parámetros
    $sql->bindParam(':anio', $anio, PDO::PARAM_INT);
    $sql->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $sql->execute();
    //Validar que hay registros
    $registrosEncontrados = $sql->rowCount();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    $json_resultado = json_encode($resultado);
    //Cerrar conexión
    $con = null;
?>


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
    <link rel="stylesheet" href="assets/css/formularios.css">
    <link rel="stylesheet" href="assets/js/consultas.js">
    <link rel="icon" href="assets/img/ojociudadanoVec.png" type="image/png">
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- <script src="assets/js/funcionesResultados.js"></script> -->

    <!-- Styles -->
    <style>
        #chartdiv {
        width: 100%;
        height: 500px;
        }
    </style>
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
    <section class="text-center bg-light features-icons" style="background: rgb(255,255,255);padding:50px 0 20px 0;background-size: cover;">
        <div class="container mt-4 shadow-lg p3 mb-5 bg-body rounded" id="chartdiv"></div>
    </section>
    <section class="text-center bg-light features-icons" style="background: rgb(255,255,255);padding:10px 0 50px 0;background-size: cover;">
        <div class="container mt-4 shadow-lg p3 mb-5 bg-body rounded">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Chart code -->
    <script>
        window.onload = function Datos(){
            consultaVacia(event);
        }
        function sleep(ms){
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        
        async function consultaVacia(event){
            event.preventDefault();
            var registrosAfectados = parseInt(<?php echo $registrosEncontrados;?>);
            if(registrosAfectados == 0){
                Swal.fire({
                    icon: 'warning',
                    title: 'No se encontraron registros',
                    text: 'Prueba con otra consulta',
                    showConfirmButton: false,
                    time: 3000
                })
                await sleep(3050);
                window.location.href = "consultas.php";
            }    
        }
        //Chart
        am5.ready(function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");
            
            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
            am5themes_Animated.new(root)
            ]);
            
            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true
            }));
            
            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);
            
            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
            xRenderer.labels.template.setAll({
            rotation: -90,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15
            });
            
            xRenderer.grid.template.setAll({
            location: 1
            })
            
            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "estado",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
            }));
            
            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
            }));
            
            // Create series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "cantidad",
            sequencedInterpolation: true,
            categoryXField: "estado",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
            }));
            
            series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
            series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
            });
            
            series.columns.template.adapters.add("stroke", function(stroke, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
            });
            
            // Set data
            var data = <?php echo $json_resultado; ?>;
            var chart_data = [];
            for(var i=0; i<data.length; i++){
                chart_data.push({
                    "estado" : data[i].estado,
                    "cantidad" : parseFloat(data[i].cantidad)
                });
            }
            console.log(chart_data);

            // Asigna datos al eje x
            xAxis.data.setAll(chart_data)
            // Asigna datos a la serie
            series.data.setAll(chart_data);
            
            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
            
            //Table
            var table = document.getElementById("content");
            for(var i=0; i<data.length; i++){
                var row = table.insertRow(i);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = data[i].estado;
                cell2.innerHTML = data[i].cantidad;
            }
        
        }); // end am5.ready()
    </script>
    
</body>
</html>
