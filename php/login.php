<?php
session_start();
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Buscar usuario de forma segura con sentencias preparadas
    $sql = "SELECT id, nombre, password, status, role FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if (password_verify($password, $usuario["password"])) {
            // Verificar si el usuario está activo
            if ($usuario["status"] == 1) {
                // Guardar datos en sesión
                $_SESSION["id_usuario"] = $usuario["id"];
                $_SESSION["nombre"]     = $usuario["nombre"];
                $_SESSION["role"]       = $usuario["role"];

                header("Location: ../home.php"); // Página principal del sistema
                exit;
            } else {
                // Usuario inactivo o pendiente de validación
                header("Location: ../index.php?error=pending");
                exit;
            }
        } else {
            header("Location: ../login.php?error=credentials");
        }
    } else {
        header("Location: ../login.php?error=credentials");
    }
    mysqli_stmt_close($stmt);
}
?>
