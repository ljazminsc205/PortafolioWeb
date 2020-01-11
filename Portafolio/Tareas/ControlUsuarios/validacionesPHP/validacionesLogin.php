<?php
session_start( );

include "../controllerDB.php";
require './phpMailer/PHPMailerAutoload.php' ;



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

    //Si se quiere generar una contraseña
function generarContrasenna(){
    //Carácteres para la contraseña
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Reconstruimos la contraseña segun la longitud que se quiera
    for($i=0;$i<10;$i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str,rand(0,62),1);
    }
    //Mostramos la contraseña generada
    return $password;
}

if(isset($_POST["submit2"])){
    $email = $_POST["email"] ;

    if(empty($email)){
        header("Location: ../login.php?error=IngreseCorreo");
        exit();
    }

    $consulta = new ControllerDB();
    $resultado = $consulta->obtenerUsuario($email);
    
    if ($resultado==FALSE){
        header("Location: ../login.php?error=correoSinEnviar"); 
        exit();
    }
    
        $contrasennaNueva =  generarContrasenna();

        $mail = new PHPMailer;
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'introweb.introweb@gmail.com';                 // SMTP username
        $mail->Password = 'CORREOweb2020';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;  
        
        $mail->setFrom('introweb.introweb@gmail.com');
        $mail->addAddress($email);     // Add a recipient
        
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Restablecimiento de contraseña';
        $mail->Body = '<html>'.
                        '<head><title>Restablecimiento de contraseña</title></head>'.
                        '<body><h2>Restablecimiento de contraseña</h2>'.
                        '<hr>'.
                        'Ha solicitado el reestablecimiento de su contraseña, por lo que hemos generado una contraseña temporal:   '.
                        '<h1>'.$contrasennaNueva.'</h1>'.                   
                        '<hr>'.
                        'Enviado por mi programa en PHP'.
                        '</body>'.
                        '</html>';

        // .$contrasennaNueva ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
            // echo 'Message could not be sent.-----<br>';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            header("Location: ../login.php?error=correoSinEnviar");
            exit();
        } else {
            // echo 'Message has been sent';
            header("Location: ../login.php?error=ingreso&correo=".$email);
            $consulta = new ControllerDB();
            $consulta->reestablecerContrasenna ( $email , $contrasennaNueva);

            exit();
        }

    }


?>
