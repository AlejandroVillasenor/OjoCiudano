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
    if($row){
        $idAdmin = $row['id_administrador'];
        $sql = "SELECT * FROM denuncia_imputado WHERE id_administrador = '$idAdmin'";
        $res = $con->query($sql);
        $fila = $res->rowCount();
        if($fila > 0){
            echo "
            <table class='table' style='border-spacing: 15px;'>
                <thead>
                    <tr>
                        <th style='text-align: center'>id_Denuncia</th>
                        <th style='text-align: center'>Nombre</th>
                        <th style='text-align: center'>Alias</th>
                        <th style='text-align: center'>Genero</th>
                        <th style='text-align: center'>Desc_imputado</th>
                        <th style='text-align: center'>Des_hechos</th>
                        <th style='text-align: center'>Estado</th>
                        <th style='text-align: center'>Municipio</th>
                        <th style='text-align: center'>Fecha</th>
                        <th style='text-align: center'>Hora</th>
                        <th style='text-align: center'>Opciones</th>
                    </tr>
                </thead> 
                <tbody>
            ";
            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $idDenuncia = $row["id_denunciaimputado"];
                $nombre = $row["nombre"];
                $alias = $row["alias"];
                $genero = $row["genero"];
                $desc_imputado = $row["desc_imputado"];
                $desc_hechos = $row["desc_hechos"];
                $municipio_hecho = $row["municipio_hechos"];
                $estado_hecho = $row["estado_hechos"];
                $fecha_hechos = $row["fecha_hechos"];
                $hora_hechos = $row["hora_hechos"];
                echo "
                    <tr>
                        <td>$idDenuncia</td>
                        <td>$nombre</td>
                        <td>$alias</td>
                        <td>$genero</td>
                        <td>$desc_imputado</td>
                        <td>$desc_hechos</td>
                        <td>$municipio_hecho</td>
                        <td>$estado_hecho</td>
                        <td>$fecha_hechos></td>
                        <td>$hora_hechos</td>
                        <td>XD</td>
                    </tr>
                ";
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