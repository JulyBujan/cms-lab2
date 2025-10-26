<?php
session_start();
include_once "conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
$id_publicacion = $_GET["id"] ?? null;

if ($id_publicacion) {
    // Verificar que la publicación sea del usuario
    $check = mysqli_query($conn, "SELECT * FROM publicaciones WHERE id = '$id_publicacion' AND id_usuario = '$id_usuario'");
    
    if (mysqli_num_rows($check) == 1) {
        // Realizar borrado lógico
        $sql = "UPDATE publicaciones SET estado = 0 WHERE id = '$id_publicacion'";
        mysqli_query($conn, $sql);
    }
}

header("Location: ../home.php");
exit;
?>
