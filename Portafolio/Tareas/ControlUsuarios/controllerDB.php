<?php

include "conexionBD.php";


class ControllerDB
{
    public function obtenerUsuario($identificacion)
    {
        $sql_query = "select email, contrasenna , nombreUsuario, nombre, apellidos, fechaNacimiento, telefono from Usuarios where nombreUsuario = '" . $identificacion . "' or email= '".$identificacion . "';";
        $conexion= new ConexionBD(); 
        $resultado = $conexion->consultar($sql_query);
        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();

        } else {
            return FALSE;
        }
    }

    public function reestablecerContrasenna ($email , $contrasennaNueva){
        $sql_query = "update Usuarios  set contrasenna = '".$contrasennaNueva."'WHERE email = '".$email. "';";
        $conexion= new ConexionBD(); 
        $conexion->consultar($sql_query);
    }

    public function recuperarContrasenna(){

    }
    
    public function insertarUsuario( $email, $contrasenna, $nombreUsuario, $nombre, $apellidos, $fechaNacimiento, $telefono  ){
        $sql_query = "insert into Usuarios(email, contrasenna, nombreUsuario, nombre, apellidos, fechaNacimiento, telefono) values('".$email."' , '".$contrasenna."' , '".$nombreUsuario."' ,'".$nombre."','".$apellidos."', '".$fechaNacimiento."','".$telefono."');";
        $conexion= new ConexionBD();
        $conexion->consultar($sql_query);
    }

    public function emailExiste($email){
        $sql_query = " select nombre from Usuarios where email= '" . $email . "';" ;
        $conexion= new ConexionBD(); 
        $resultado = $conexion->consultar($sql_query);
        if($resultado->num_rows > 0){
            return True;
        }else{
            return FALSE;
        }
    }

    public function nombreUsuarioExiste($nombreUsuario){
        $sql_query = "select nombre from Usuarios where nombreUsuario= '" . $nombreUsuario . "';" ;
        $conexion= new ConexionBD(); 
        $resultado = $conexion->consultar($sql_query);
        if($resultado->num_rows > 0){
            return True;
        }else{
            return FALSE;
        }
    }


}

?>
