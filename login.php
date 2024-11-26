<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Consulta a la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user = :user AND password = :password");
    $stmt->execute(['user' => $user, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Si el usuario y la contraseña son correctos
        $_SESSION['user'] = $user['user'];
        header('Location: Pag1.html'); // Redirige al dashboard
        exit();
    } else {
        // Si las credenciales son incorrectas
        echo "<p style='color:red;'>Invalid username or password</p>";
    }
}
?>
