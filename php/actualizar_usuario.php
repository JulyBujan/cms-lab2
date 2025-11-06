<?php
session_start();
include_once "conexion.php";

// 1. Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login.php");
    exit;
}

// 2. Verificar que el usuario sea administrador (rol = 2)
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 2) {
    header("Location: ../home.php?error=unauthorized");
    exit;
}

// 3. Validar que la solicitud sea por POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../gestion_usuarios.php");
    exit;
}

$id_admin_actual = $_SESSION["id_usuario"];
$id_usuario_mod = $_POST["id_usuario_mod"];
$nuevo_rol = $_POST["role"];
$nuevo_status = $_POST["status"];

// 4. Un administrador no puede cambiarse el rol o estado a sí mismo
if ($id_usuario_mod == $id_admin_actual) {
    header("Location: ../gestion_usuarios.php?error=self");
    exit;
}

// 5. Preparar y ejecutar la actualización
// Usar sentencias preparadas para mayor seguridad
$sql = "UPDATE usuarios SET role = ?, status = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "iii", $nuevo_rol, $nuevo_status, $id_usuario_mod);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../gestion_usuarios.php?success=true");
} else {
    header("Location: ../gestion_usuarios.php?error=update_failed");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;