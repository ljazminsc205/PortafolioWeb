<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="perfil.css">
    <script defer src="./perfil.js"></script>
</head>

<body>

 <?php 

    if(isset($_GET["errorCambioContrasenna"])) 
    {
        $mensajeError="";
        $colorAlerta="danger";

        if ($_GET["errorCambioContrasenna"] == "Campos_Registro_Vacio") {
            $mensajeError = "Campos vacíos"; 
        }elseif($_GET["errorCambioContrasenna"] == "ContrasennaPorCambiarIncorrecta"){
            $mensajeError = "Credenciales incorrectas";
        }elseif($_GET["errorCambioContrasenna"] == "Formato_invalido"){
            $mensajeError = "La contraseña debe tener un tamaño minimo de 8 caracteres(mayúsculas, minúsculas y números).";
        }elseif($_GET["errorCambioContrasenna"] == "LasContrasennasDebeSerIguales"){
            $mensajeError = "La contraseña ingresada no coincide con la anterior";
        }elseif($_GET["errorCambioContrasenna"] == "Contraseña_modificada"){
            $mensajeError = "La contraseña ha sido cambiada";
            $colorAlerta="success";
        }


        ?>
            <div class="alert alert-<?php echo $colorAlerta?> alert-dismissible fade show centrarAlert" role="alert">
            <?php echo $mensajeError ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php
    }
    ?>
    <div class="fondo">

    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nombre-usuario">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Perfil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuraciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  >Cambiar contraseña</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php">Salir</a>
                    </div>
                </li>

            </ul>
        </div>
        <div>
            <img class="foto-perfil" src="../../../ImagenesWeb/default-user.png" alt="foto perfil">
            <span class="nombre-usuario"> <?php  echo  $_SESSION["nombre"]." ". $_SESSION["apellidos"]  ?> </span>
        </div>
    </nav>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reestablecer contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form  action="./validacionesPHP/validacionesCambioContrasenna.php" class="estiloForm" method = "post" >
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Contraseña actual:</label>
                <input type="password" class="form-control" id="contrasennaActual" name="contrasennaActual" >
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Contraseña nueva:</label>
                <input type="password" class="form-control" id="contrasennaNueva" name="contrasennaNueva" >
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Ingrese nuevamente la contraseña:</label>
                <input type="password" class="form-control" id="contrasennaNueva2"  name="contrasennaNueva2"  >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button   type="submit" name = "submit" class="btn btn-primary">Enviar solicitud</button>
            </div>

            </form>
        </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <div class="animation-area">
</body>

</html>