<?php
session_start();

include "../controllerDB.php";

if(isset($_POST["submit"])){
    $nombreRegistro = $_POST["nombreRegistro"] ; 
    $apellidoRegistro = $_POST["apellidosRegistro"] ;
    $telefonoRegistro = $_POST["telefonoRegistro"] ;
    $fechaNacimiento = $_POST["trip-start"];
    $emailRegistro = $_POST["emailRegistro"];
    $contrasennaRegistro = $_POST["contrasennaRegistro"];
    $nombreUsuarioRegistro =$_POST["nombreUsuario"];

    $_SESSION["nombre-registro"]  = $nombreRegistro;  
    $_SESSION["apellido-registro"]  = $apellidoRegistro;
    $_SESSION["telefono-registro"]  = $telefonoRegistro;
    $_SESSION["fecha-registro"] = $fechaNacimiento;
    $_SESSION["email-registro"] = $emailRegistro;
    $_SESSION["usuario-registro"] = $nombreUsuarioRegistro;

    if(empty($nombreUsuarioRegistro) || empty($apellidoRegistro) || empty($telefonoRegistro) || empty($fechaNacimiento) || empty($emailRegistro) ||empty($contrasennaRegistro) || empty($nombreRegistro))
    {
        header("Location: ../login.php?errorRegistro=Campos_Registro_Vacio");
        exit();
    }
    $consulta = new ControllerDB();
    $disponibilidadCorreo = $consulta->emailExiste($emailRegistro);
    if($disponibilidadCorreo){
        header("Location: ../login.php?errorRegistro=Correo_ya_existe");
        exit();
    }

    if($consulta->nombreUsuarioExiste($nombreUsuarioRegistro)){
        header("Location: ../login.php?errorRegistro=Nombre_usuario_ya_existe");
        exit();
    }

    // validar que la contraseña nueva tenga el formato correcto
    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $contrasennaRegistro )){
        header("Location: ../login.php?errorRegistro=Formato_invalido");
        exit();
    }

    $consulta->insertarUsuario($emailRegistro , $contrasennaRegistro , $nombreUsuarioRegistro ,$nombreRegistro, $apellidoRegistro, $fechaNacimiento , $telefonoRegistro);
    $_SESSION["email"] = $emailRegistro;
    $_SESSION["nombreUsuario"] = $nombreUsuarioRegistro;
    $_SESSION["contrasenna"] = $contrasennaRegistro;
    $_SESSION["nombre"] = $nombreRegistro;
    $_SESSION["apellidos"] = $apellidoRegistro;
    $_SESSION["fechaNacimiento"] = $fechaNacimiento;
    $_SESSION["telefono"] = $telefonoRegistro;

    $_SESSION["nombre-registro"]  = "";  
    $_SESSION["apellido-registro"]  = "";
    $_SESSION["telefono-registro"]  = "";
    $_SESSION["fecha-registro"] = "";
    $_SESSION["email-registro"] = "";
    $_SESSION["usuario-registro"] = "";

    header("Location: ../perfil.php"); 


    exit();




}









?>