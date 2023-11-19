<?php
    //Conexión base de datos
    require "../db.php";
    $conexion = new Conexion();
    $con = $conexion->ConexionBD();
    
    //Captura de datos
    $idDenuncia = $_POST["idDenuncia"];
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
    if(strlen($calle)<100 && strlen($calle)>0){
        if(strlen($numero_int)<10){
            if(strlen($numero_ext)<10 && strlen($numero_ext)>0){
                if(strlen($municipio_lugar)<100 && strlen($municipio_lugar)>0){
                    if(strlen($estado_lugar)<35 && strlen($estado_lugar)>0){
                        if(strlen($desc_hechos)>0){
                            if(strlen($caracteristicas)>0){
                                $calle = ucwords($calle);
                                $municipio_lugar = ucwords($municipio_lugar);
                                $estado_lugar = ucwords($estado_lugar);
                                $numero_int = strtoupper($numero_int);
                                $numero_ext = strtoupper($numero_ext);

                                $sqlupdate = "UPDATE denuncia_lugar SET
                                calle = :calle, 
                                numero_int = :numero_int, 
                                numero_ext = :numero_ext, 
                                caracteristicas = :caracteristicas, 
                                municipio_lugar = :municipio_lugar, 
                                estado_lugar = :estado_lugar, 
                                desc_hechos = :desc_hechos, 
                                fecha_hechos = :fecha_hechos, 
                                hora_hechos = :hora_hechos
                                WHERE id_denuncialugar = :idDenuncia";
                                
                                $stmt = $con->prepare($sqlupdate);
                                $stmt->bindParam(':idDenuncia', $idDenuncia);
                                $stmt->bindParam(':calle', $calle);
                                $stmt->bindParam(':numero_int', $numero_int);
                                $stmt->bindParam(':numero_ext', $numero_ext);
                                $stmt->bindParam(':caracteristicas', $caracteristicas);
                                $stmt->bindParam(':municipio_lugar', $municipio_lugar);
                                $stmt->bindParam(':estado_lugar', $estado_lugar);
                                $stmt->bindParam(':desc_hechos', $desc_hechos);
                                $stmt->bindParam(':fecha_hechos', $fecha_hechos);
                                $stmt->bindParam(':hora_hechos', $hora_hechos);
                                
                                
                                if ($stmt->execute()) {
                                    if ($stmt->rowCount() > 0) {
                                        $con->commit();
                                        echo 1;
                                    }
                                    else{
                                        $con->rollBack();
                                        echo 2;
                                    }
                                } else {
                                    $con->rollBack();
                                    $errorInfo = $stmt->errorInfo();
                                    echo 2;
                                }
                                $con = null;
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
    
?>