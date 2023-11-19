<?php
/* Insert de los imoutados a la base de datos */
require "../db.php";
$conexion = new Conexion();
$con = $conexion->ConexionBD();

$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['captcha'];
$secretkey = "YOURKEY";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
$atributos = json_decode($response,TRUE);

if ($atributos['success']) {
    $nombre = $_POST["nombre"];
    $alias = $_POST["alias"];
    $genero = $_POST["sexo"];//Radio button
    $desc_imputado = $_POST["desc_imputado"];
    $desc_hechos = $_POST["desc_hechos"];
    $municipio_hechos = $_POST["municipio"];
    $estado_hechos = $_POST["estado"];
    $fecha_hechos = $_POST["fecha"];
    $hora_hechos = $_POST["hora"];

    $con->beginTransaction(); // Iniciar transacción
    if(strlen($nombre)<60 & strlen($nombre)>0){
        if(strlen($alias)<60 & strlen($alias)>0){
            if(strlen($municipio_hechos)<100 & strlen($municipio_hechos)>0){
                if(strlen($estado_hechos)<35 & strlen($estado_hechos)>0){
                    if(strlen($desc_imputado >0)){
                        if(strlen($desc_hechos)>0){
                            $sqlIdAdmin = "SELECT id_administrador FROM administrador ORDER BY RANDOM() LIMIT 1";
                            $resIdAdmin = $con->query($sqlIdAdmin);
                            $rowIdAdmin = $resIdAdmin->fetch(PDO::FETCH_ASSOC);
                            $id_administrador = $rowIdAdmin['id_administrador'];

                            $nombre = ucwords($nombre);
                            $alias = ucwords($alias);
                            $municipio_hechos = ucwords($municipio_hechos);
                            $estado_hechos = ucwords($estado_hechos);
                            $sqlInsert = "INSERT INTO denuncia_imputado 
                            (nombre, alias, genero, desc_imputado, desc_hechos, 
                            municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
                            VALUES (:nombre, :alias, :genero, :desc_imputado, :desc_hechos,
                            :municipio_hechos, :estado_hechos, :fecha_hechos, :hora_hechos, :id_administrador)";
                            
                            $stmt = $con->prepare($sqlInsert);
                            $stmt->bindParam(':nombre', $nombre);
                            $stmt->bindParam(':alias', $alias);
                            $stmt->bindParam(':genero', $genero);
                            $stmt->bindParam(':desc_imputado', $desc_imputado);
                            $stmt->bindParam(':desc_hechos', $desc_hechos);
                            $stmt->bindParam(':municipio_hechos', $municipio_hechos);
                            $stmt->bindParam(':estado_hechos', $estado_hechos);
                            $stmt->bindParam(':fecha_hechos', $fecha_hechos);
                            $stmt->bindParam(':hora_hechos', $hora_hechos);
                            $stmt->bindParam(':id_administrador', $id_administrador);

                            if ($stmt->execute()) {
                                $con->commit();
                                echo 1;
                            } else {
                                $con->rollBack(); // Revertir cambios en caso de error
                                $errorInfo = $stmt->errorInfo();
                                echo 2;
                            }
                        }else{
                            echo 4;
                        }
                    }else{
                        echo 4;
                    }
                }else{
                    echo 4;
                }
            }else{
                echo 4;
            }
        }else{
            echo 4;
        }
    }else{
        echo 4;
    }
}else{
    echo 3;
}

?>