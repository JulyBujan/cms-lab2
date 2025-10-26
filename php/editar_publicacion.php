<?php
session_start();
include_once "conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
$id         = $_POST["id"];
$titulo     = mysqli_real_escape_string($conn, $_POST["titulo"]);
$contenido  = mysqli_real_escape_string($conn, $_POST["contenido"]);

// Verificar que sea del usuario
$sql_check = "SELECT * FROM publicaciones WHERE id = '$id' AND id_usuario = '$id_usuario'";
$res_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($res_check) != 1) {
    echo "No tenés permiso para editar esta publicación.";
    exit;
}

// Ver si subieron nueva imagen
$nombre_imagen = "";
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $nombre_original = basename($_FILES["imagen"]["name"]);
    $ext = pathinfo($nombre_original, PATHINFO_EXTENSION);
    $nombre_imagen = uniqid("img_") . "." . $ext;
    move_uploaded_file($tmp_name, "../publicaciones/" . $nombre_imagen);

    // Actualizar con imagen nueva
    $sql_update = "UPDATE publicaciones SET titulo = '$titulo', contenido = '$contenido', imagen = '$nombre_imagen' WHERE id = '$id'";
} else {
    // Actualizar sin cambiar imagen
    $sql_update = "UPDATE publicaciones SET titulo = '$titulo', contenido = '$contenido' WHERE id = '$id'";
}

if (mysqli_query($conn, $sql_update)) {
    header("Location: ../home.php");
    exit;
} else {
    echo "Error al actualizar: " . mysqli_error($conn);
}
?>
