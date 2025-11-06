<?php
session_start();
include_once "conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION["id_usuario"];
    $titulo     = $_POST["titulo"];
    $contenido  = $_POST["contenido"]; // No es necesario escapar ni limpiar aquí.

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

    // Insertar en la base de datos de forma segura
    $sql = "INSERT INTO publicaciones (id_usuario, titulo, contenido, imagen) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isss", $id_usuario, $titulo, $contenido, $nombre_imagen);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: /home.php");
        exit;
    } else {
        // Error: Registrar el fallo y redirigir con un mensaje amigable.
        // error_log("Error al crear publicación: " . mysqli_error($conn)); // Descomentar en un servidor de producción
        header("Location: ../nueva.php?error=db_error");
        exit;
    }
    mysqli_stmt_close($stmt);
}
?>