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

    if (move_uploaded_file($tmp_name, $ruta_destino)) {
        echo "✅ Imagen subida correctamente a: $ruta_destino";
    } else {
        echo "❌ Error al mover la imagen 😢";
    }
}



    // Insertar en la base
    $sql = "INSERT INTO publicaciones (id_usuario, titulo, contenido, imagen)
            VALUES ('$id_usuario', '$titulo', '$contenido', '$nombre_imagen')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../home.php");
        exit;
    } else {
        echo "Error al guardar publicación: " . mysqli_error($conn);
    }
}
?>
