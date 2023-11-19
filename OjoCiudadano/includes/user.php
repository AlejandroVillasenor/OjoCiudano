<?php
include_once 'db.php';

class User extends Conexion{
    private $username;
    public function userExist($user, $pass){
        //$md5pass = md5($pass);
        $query = $this->ConexionBD()->prepare('SELECT * FROM administrador WHERE correo_electronico = :user AND contrasena = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->ConexionBD()->prepare('SELECT * FROM administrador WHERE correo_electronico = :user');
        $query->execute(['user' => $user]);

        foreach($query as $currentUser){
            $this->username = $currentUser['nombre'];
        }
    }
}


?>