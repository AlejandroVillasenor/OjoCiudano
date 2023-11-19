<?php
/* Insert de los imoutados a la base de datos */
require "../db.php";
$conexion = new Conexion();
$con = $conexion->ConexionBD();

$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['captcha'];
$secretkey = "6Le18wwpAAAAAPB8Wq1VnPRz6rPlMn2iAFwjx9GR";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
$atributos = json_decode($response,TRUE);

if ($atributos['success']) {
    $calle = $_POST["calle"];
    $numero_int = $_POST["interior"];
    $numero_ext = $_POST["exterior"];
    $caracteristicas = $_POST["desc_domicilio"];
    $estado_lugar = $_POST["estado"];
    $municipio_lugar = $_POST["municipio"];
    $desc_hechos = $_POST["desc_hechos"];
    $fecha_hechos = $_POST["fecha"];
    $hora_hechos = $_POST["hora"];

    $con->beginTransaction(); // Iniciar transacción
    if(strlen($calle)<100 & strlen($calle)>0){
        if(strlen($numero_int)<10){
            if(strlen($numero_ext)<10 & strlen($numero_ext)>0){
                if(strlen($municipio_lugar)<100 & strlen($municipio_lugar)>0){
                    if(strlen($estado_lugar)<35 & strlen($estado_lugar)>0){
                        if(strlen($desc_hechos)>0){
                            if(strlen($caracteristicas)>0){
                                $sqlIdAdmin = "SELECT id_administrador FROM administrador ORDER BY RANDOM() LIMIT 1";
                                $resIdAdmin = $con->query($sqlIdAdmin);
                                $rowIdAdmin = $resIdAdmin->fetch(PDO::FETCH_ASSOC);
                                $id_administrador = $rowIdAdmin['id_administrador'];

                                $calle = ucwords($calle);
                                $municipio_lugar = ucwords($municipio_lugar);
                                $estado_lugar = ucwords($estado_lugar);
                                $numero_int = strtoupper($numero_int);
                                $numero_ext = strtoupper($numero_ext);

                                $sqlInsert = "INSERT INTO denuncia_lugar
                                (calle, numero_int, numero_ext, caracteristicas, municipio_lugar,
                                estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
                                VALUES (:calle, :numero_int, :numero_ext, :caracteristicas, :municipio_lugar,
                                :estado_lugar, :desc_hechos, :fecha_hechos, :hora_hechos, :id_administrador)";

                                $stmt = $con->prepare($sqlInsert);
                                $stmt->bindParam(':calle', $calle);
                                $stmt->bindParam(':numero_int', $numero_int);
                                $stmt->bindParam(':numero_ext', $numero_ext);
                                $stmt->bindParam(':caracteristicas', $caracteristicas);
                                $stmt->bindParam(':municipio_lugar', $municipio_lugar);
                                $stmt->bindParam(':estado_lugar', $estado_lugar);
                                $stmt->bindParam(':desc_hechos', $desc_hechos);
                                $stmt->bindParam(':fecha_hechos', $fecha_hechos);
                                $stmt->bindParam(':hora_hechos', $hora_hechos);
                                $stmt->bindParam(':id_administrador', $id_administrador);

                                if ($stmt->execute()) {
                                    $con->commit();
                                    echo 1;
                                } else {
                                    $con->rollBack();
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
        echo 4;
    }

}else{
    echo 3;
}
?>