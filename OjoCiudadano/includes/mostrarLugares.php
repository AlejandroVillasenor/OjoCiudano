<?php
    //Se recupera sesion
    session_start();
    $correoAdmin = $_SESSION['user'];
    //Conexión base de datos
    require "../db.php";
    $conexion = new Conexion();
    $sql = "SELECT * FROM administrador WHERE correo_electronico = '$correoAdmin'";
    $con = $conexion->ConexionBD();
    $res = $con->query($sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $numfila = 2; //Para identificar registros en la tabla 
    if($row){
        $idAdmin = $row['id_administrador'];
        $sql = "SELECT * FROM denuncia_lugar WHERE id_administrador = '$idAdmin'";
        $res = $con->query($sql);
        $fila = $res->rowCount();
        if($fila > 0){
            echo "
            <table class='table' style='border-spacing: 15px;'>
                <thead>
                    <tr>
                        <th style='text-align: center'>id_Denuncia</th>
                        <th style='text-align: center'>Calle</th>
                        <th style='text-align: center'>Num. Int</th>
                        <th style='text-align: center'>Num. Ext</th>
                        <th style='text-align: center'>Caracteristicas</th>
                        <th style='text-align: center'>Estado</th>
                        <th style='text-align: center'>Municipio</th>
                        <th style='text-align: center'>Desc. Hechos</th>
                        <th style='text-align: center'>Fecha</th>
                        <th style='text-align: center'>Hora</th>
                        <th style='text-align: center'>Opciones</th>
                    </tr>
                </thead> 
                <tbody>
            ";
            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $idDenuncia = $row["id_denuncialugar"];
                $calle = $row["calle"];
                $numInt = $row["numero_int"];
                $numExt = $row["numero_ext"];
                $caracteristicas = $row["caracteristicas"];
                $municipio = $row["municipio_lugar"];
                $estado_lugar = $row["estado_lugar"];
                $desc_hechos = $row["desc_hechos"];
                $fecha_hechos = $row["fecha_hechos"];
                $hora_hechos = $row["hora_hechos"];
                //Se combrueba si esta vacio el Número Interior
                if(isset($numInt)){
                    $numInt = 'N/A';
                }
                echo "
                    <tr id='fila$numfila'>
                        <td>$idDenuncia</td>
                        <td>$calle</td>
                        <td>$numInt</td>
                        <td>$numExt</td>
                        <td>$caracteristicas</td>
                        <td>$estado_lugar</td>
                        <td>$municipio</td>
                        <td>$desc_hechos</td>
                        <td>$fecha_hechos</td>
                        <td>$hora_hechos</td>
                        <td>
                            <button type='button' class='BotonesEditar' onclick=\"window.location.href='denunciaLugar_modifica.php?ID=$idDenuncia'\">
                                <img src='assets/img/editarIcono.png' alt='IconoEditar' class='imagenesOpciones'>
                            </button>
                            <button type='button' class='BotonesBorrar' onclick='eliminarLugar($idDenuncia, $numfila)'>
                                <img src='assets/img/eliminarIcono.png' alt='IconoBorrar' class='imagenesOpciones'>
                            </button> 
                        </td>
                    </tr>
                ";
                $numfila++;
            }
            echo '
                </tbody>
            </table>
            ';
        }
    }
    else{
        echo("Administrador no encotrado");
    }
?>