<?php 

include "../controllerDB.php";

if(isset($_POST["submit"])){
    $contrasennaActual = $_POST["contrasennaActual"] ; 
    $contrasennaNueva = $_POST["contrasennaNueva"] ;
    $contrasennaNueva2 = $_POST["contrasennaNueva2"] ;

    if(empty($contrasennaActual) || empty($contrasennaNueva) || empty($contrasennaNueva2)){
        header("Location: ../login.php?errorRegistro=Campos_Registro_Vacio");
        exit();
    }

    
    $consulta = new ControllerDB();



}




?>