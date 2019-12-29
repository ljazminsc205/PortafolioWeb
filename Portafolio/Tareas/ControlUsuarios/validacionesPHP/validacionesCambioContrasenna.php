<?php 
session_start();
include "../controllerDB.php";


if(isset($_POST["submit"])){
    $contrasennaActual = $_POST["contrasennaActual"] ; 
    $contrasennaNueva = $_POST["contrasennaNueva"] ;
    $contrasennaNueva2 = $_POST["contrasennaNueva2"] ;
    
    if(empty($contrasennaActual) || empty($contrasennaNueva) || empty($contrasennaNueva2)){
        header("Location: ../perfil.php?errorCambioContrasenna=Campos_Registro_Vacio");
        exit();
    }

    $consulta = new ControllerDB();
    $verificarContrasenna = $consulta->verificarContrasenna($_SESSION["email"]);
    
    if($contrasennaActual !=$verificarContrasenna['contrasenna']){
        header("Location: ../perfil.php?errorCambioContrasenna=ContrasennaPorCambiarIncorrecta");
        exit();
    }

    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $contrasennaNueva)){
            header("Location: ../perfil.php?errorCambioContrasenna=Formato_invalido");
            exit();
        }
    if($contrasennaNueva != $contrasennaNueva2){
        header("Location: ../perfil.php?errorCambioContrasenna=LasContrasennasDebeSerIguales");
        exit();
    }
    
    $consulta->reestablecerContrasenna ($_SESSION["email"] , $contrasennaNueva);
    header("Location: ../perfil.php?errorCambioContrasenna=Contraseña_modificada");
    exit();

}


?>