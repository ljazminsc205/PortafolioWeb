<?php

class ConexionBD 
{
    private $servername = "localhost";
    private $username = "lery";
    private $password = "lery";
    private $database = "controlusuarios";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password , $this->database);
        if (!$this->conn) {
            echo "no se pudo conectar";
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "se conectó";
        }
    }


    public function consultar($query)
    {
        return $this->conn->query($query);
        
    }

}


