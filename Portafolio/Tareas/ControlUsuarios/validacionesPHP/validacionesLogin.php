<?php
session_start( );

include "../controllerDB.php";

if ( isset($_POST["submit"])) {
    $email_login = $_POST["email"];
    $password_login = $_POST["password"];

    if(empty($email_login) || empty($password_login) ){
        header("Location: ../login.php?error=Campos_vacios"); 
        exit();
    }
    $_SESSION['email-login'] =$email_login;

    $consulta = new ControllerDB();
    $resultado = $consulta->obtenerUsuario($email_login);
    if ($resultado==FALSE){
        header("Location: ../login.php?error=Credenciales_incorrectas"); 
        exit();
    }else{
        if($password_login==$resultado['contrasenna']){
            $_SESSION["email"] = $resultado['email'];
            $_SESSION["nombreUsuario"] = $resultado['nombreUsuario'];
            $_SESSION["nombre"] = $resultado['nombre'];
            $_SESSION["apellidos"] = $resultado['apellidos'];
            $_SESSION["fechaNacimiento"] = $resultado['fechaNacimiento'];
            $_SESSION["telefono"] = $resultado['telefono'];

            $_SESSION['email-login'] ="";
            header("Location: ../perfil.php"); 
            exit();
        }else{
            header("Location: ../login.php?error=Credenciales_incorrectas"); 
            exit();
        }
    }
}
?>
