<?php
session_start();
include_once "conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION["id_usuario"];
    $titulo     = mysqli_real_escape_string($conn, $_POST["titulo"]);
    $contenido_bruto = $_POST["contenido"];
    $contenido_limpio = strip_tags($contenido_bruto, "<p><br><strong><em><ul><ol><li>");
    $contenido = mysqli_real_escape_string($conn, $contenido_limpio);


// Procesar imagen si se cargó
$nombre_imagen = "";
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $nombre_original = basename($_FILES["imagen"]["name"]);
    $ext = pathinfo($nombre_original, PATHINFO_EXTENSION);
    $nombre_imagen = uniqid("img_") . "." . $ext;
    $ruta_destino = "../img/" . $nombre_imagen;

    if (!move_uploaded_file($tmp_name, $ruta_destino)) {
        die("Error al subir la imagen. Verifique los permisos de la carpeta 'img'.");
    }
}



    // Insertar en la base
    $sql = "INSERT INTO publicaciones (id_usuario, titulo, contenido, imagen)
            VALUES ('$id_usuario', '$titulo', '$contenido', '$nombre_imagen')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /home.php");
        exit;
    } else {
        // En lugar de un 'echo', es mejor manejar el error de otra forma.
        // Por ahora, morimos para evitar el error de headers.
        die("Error al guardar la publicación: " . mysqli_error($conn));
    }
}
?>