<?php 
    //Conexión base de datos
    require "../db.php";
    $conexion = new Conexion();
    $con = $conexion->ConexionBD();

    $con->beginTransaction(); // Iniciar transacción
    
    //Recibe variable
    $idDenunciaLugar = $_REQUEST['ID'];
    $sql = "DELETE FROM denuncia_lugar WHERE id_denuncialugar = :idDenuncia";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':idDenuncia', $idDenunciaLugar);
    $stmt->execute();
    if ($stmt->execute()) {
        $con->commit();
        echo 1;
    } else {
        $con->rollBack(); // Revertir cambios en caso de error
        $errorInfo = $stmt->errorInfo();
        echo 2;
    }
?>