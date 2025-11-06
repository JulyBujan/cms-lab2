<?php
include_once "seguridad.php";
include_once "conexion.php";

// Los invitados (rol 1) no pueden editar.
denegar_rol(1);

$id_usuario = $_SESSION["id_usuario"];
$id         = $_POST["id"];
$titulo     = $_POST["titulo"];
$contenido  = $_POST["contenido"]; // No es necesario escapar, las sentencias preparadas se encargan.

// Lógica para manejar la subida de una nueva imagen
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $nombre_original = basename($_FILES["imagen"]["name"]);
    $ext = pathinfo($nombre_original, PATHINFO_EXTENSION);
    $nombre_imagen = uniqid("img_") . "." . $ext;
    move_uploaded_file($tmp_name, "../publicaciones/" . $nombre_imagen);

    // Actualizar con imagen nueva. La condición WHERE id_usuario = ? es una capa extra de seguridad.
    $sql = "UPDATE publicaciones SET titulo = ?, contenido = ?, imagen = ? WHERE id = ? AND id_usuario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssii", $titulo, $contenido, $nombre_imagen, $id, $id_usuario);
} else {
    // Actualizar sin cambiar la imagen
    $sql = "UPDATE publicaciones SET titulo = ?, contenido = ? WHERE id = ? AND id_usuario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssii", $titulo, $contenido, $id, $id_usuario);
}

if (mysqli_stmt_execute($stmt)) {
    // Verificar si alguna fila fue afectada para confirmar que el usuario tenía permiso
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: ../home.php");
        exit;
    } else {
        // Esto puede pasar si el ID no existe o no pertenece al usuario.
        // Redirigimos con un error de no autorizado.
        header("Location: ../home.php?error=unauthorized");
        exit;
    }
} else {
    // error_log("Error al actualizar publicación: " . mysqli_error($conn));
    header("Location: ../home.php?error=db_error");
    exit;
}

mysqli_stmt_close($stmt);
?>
