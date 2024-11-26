<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="Agregar.css">
</head>
<body>

<div class="container">
    <h2>Registro de Usuario</h2>
    <?php
    require("conexion.php");
    $conn = Conectar();

    // Verifica la conexión
    if ($conn->connect_error) {
        echo "<div class='error'>Conexión fallida: " . $conn->connect_error . "</div>";
    } else {
        echo "<div class='success'>Conexión exitosa a la base de datos.</div>";
    }

    if (isset($_POST["id"]) && isset($_POST["user"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) && isset($_POST["password"]) && isset($_POST["NomProyecto"]) && isset($_POST["Part1"]) && isset($_POST["Part2"]) && isset($_POST["Part3"])) {
        $id = $_POST["id"];
        $user = $_POST["user"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $password = $_POST["password"];
        $NomProyecto = $_POST["NomProyecto"];
        $Part1 = $_POST["Part1"];
        $Part2 = $_POST["Part2"];
        $Part3 = $_POST["Part3"];

        // Imprime los datos para confirmación
        echo "<div class='info'><strong>Datos recibidos:</strong><br>";
        echo "ID: $id<br>";
        echo "Username: $user<br>";
        echo "Correo: $correo<br>";
        echo "Teléfono: $telefono<br>";
        echo "Password: $password<br>";
        echo "Nombre del Proyecto: $NomProyecto<br>";
        echo "Participante 1: $Part1<br>";
        echo "Participante 2: $Part2<br>";
        echo "Participante 3: $Part3</div>";

        // Consulta SQL
        $sql = "INSERT INTO usuarios (id, user, correo, telefono, password, NomProyecto, Part1, Part2, Part3) VALUES ('$id', '$user', '$correo', '$telefono', '$password', '$NomProyecto', '$Part1', '$Part2', '$Part3')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Usuario agregado exitosamente.</div>";
        } else {
            echo "<div class='error'>Error al agregar el usuario: " . $conn->error . "</div>";
        }

        $conn->close();
    } else {
        echo "<div class='error'>Por favor complete todos los campos.</div>";
    }
    ?>
    <a href="PerfilAdmi.html"><button>Volver</button></a>
</div>

</body>
</html>
