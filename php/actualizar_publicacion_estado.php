<?php
include_once "seguridad.php";
include_once "conexion.php";

// Solo los administradores (rol 2) pueden realizar esta acción.
verificar_rol(2);

// Validar que la solicitud sea por POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../gestion_publicaciones.php");
    exit;
}

$id_publicacion = $_POST["id_publicacion"];
$nuevo_estado = $_POST["estado"];

// Preparar y ejecutar la actualización de forma segura
$sql = "UPDATE publicaciones SET estado = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $nuevo_estado, $id_publicacion);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../gestion_publicaciones.php?success=updated");
} else {
    header("Location: ../gestion_publicaciones.php?error=db_error");
}

mysqli_stmt_close($stmt);
exit;