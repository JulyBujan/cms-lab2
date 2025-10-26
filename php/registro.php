<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST["nombre"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // encriptamos la contraseña

    // Validar que no exista el email
    $check = mysqli_query($conn, "SELECT id FROM usuarios WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "El correo ya está registrado.";
        exit;
    }

    // Insertar usuario nuevo
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../login.php?registro=ok");

        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
