<?php 
class Conexion {
    function ConexionBD(){
        $host = "localhost";
        $dbname = "OjoCiudadano";
        $username = "postgres";
        $password = "YOURpwd";
        try{
            $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);
            
        }
        catch(PDOException $exp){
            echo("No se pudo conectar a la base de datos, $exp");
        }
        return $conn;
    } 
}
?>
