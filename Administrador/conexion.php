<?php
    function Conectar()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "ideas";

        $conn = new mysqli($host, $user, $pass, $db);
        
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        return $conn;
    }
    // Llamada a la función de conexión
    $conn = Conectar();
    //usar la conexión y luego cerrarla
    if ($conn) {
        echo "Conexión exitosa a la base de datos.";
        // Cerrar la conexión
        $conn->close();
    }
?>
