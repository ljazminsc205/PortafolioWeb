<?php

class ConexionBD 
{
    private $servername = "localhost";
    private $username = "lery";
    private $password = "lery";
    private $database = "controlUsuarios";
    private $conn;

    public function conectarBD()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password , $this->database);
        if (!$this->conn) {
            echo "no se pudo conectar";
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "se conectó";
        }
    }
}

// class LogIn
// {
//     private $email;
//     private $contrasenna;

//     $sql_query = "select email , contrasenna from Usuarios where email = emailIngresado and contrasenna = contrasennaIngresada ";

// }

// class SignUp
// {
//     private $nombre;
//     private $apellidos;
//     private $fechaNacimiento;
//     private $telefono;
//     private $email;
//     private $contrasenna;
//     private $usuario;


// }

?>


//   $servername = "localhost";
//   $username = "lery";
//   $password = "lery";
//   $database = "controlUsuarios";

//   // Create connection
//   $conn = mysqli_connect($servername, $username, $password , $database);

//   // Check connection
//   if (!$conn) {
//     echo "no se pudo conectar";
//       die("Connection failed: " . mysqli_connect_error());
//   } else {
//     $sql_query = "select * from Usuarios";
//     $resultado = $conn->query($sql_query);

//     if ($resultado->num_rows > 0) {
//       while ($row = $resultado->fetch_assoc()) {
//         echo $row['email'];
//         echo "<br>";
//       }
//     }

//     echo "se conectó";
  
//     $conn->close(); 
//   }

