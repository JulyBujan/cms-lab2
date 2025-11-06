<?php
include_once "seguridad.php";
include_once "conexion.php";

// Los invitados (rol 1) no pueden borrar.
denegar_rol(1);

$id_usuario = $_SESSION["id_usuario"];
$id_publicacion = $_GET["id"] ?? null;

if ($id_publicacion) {
    // Realizar borrado lógico de forma segura, asegurando que el ID de la publicación
    // y el ID del usuario coincidan. Esto previene que un usuario borre posts de otro.
    $sql = "UPDATE publicaciones SET estado = 0 WHERE id = ? AND id_usuario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_publicacion, $id_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: ../home.php");
exit;

?>
