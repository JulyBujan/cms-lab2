<?php
session_start();
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if (password_verify($password, $usuario["password"])) {
            // Guardar datos en sesión
            $_SESSION["id_usuario"] = $usuario["id"];
            $_SESSION["nombre"]     = $usuario["nombre"];

            header("Location: ../home.php"); // Página principal del sistema
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
