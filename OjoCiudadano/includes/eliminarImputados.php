<?php 
    //Conexión base de datos
    require "../db.php";
    $conexion = new Conexion();
    $con = $conexion->ConexionBD();

    $con->beginTransaction(); // Iniciar transacción
    
    //Recibe variable
    $idDenunciaImputado = $_REQUEST['ID'];
    $sql = "DELETE FROM denuncia_imputado WHERE id_denunciaimputado = :idDenuncia";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':idDenuncia', $idDenunciaImputado);
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