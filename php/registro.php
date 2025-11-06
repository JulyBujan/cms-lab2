<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST["nombre"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // encriptamos la contraseña

    // Validar que no exista el email
    $sql_check = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    $res_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($res_check) > 0) {
        echo "El correo ya está registrado.";
        exit;
    }
    mysqli_stmt_close($stmt_check);

    // Insertar usuario nuevo
    $sql_insert = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "sss", $nombre, $email, $password);
    
    if (mysqli_stmt_execute($stmt_insert)) {
        header("Location: ../login.php?registro=ok");
        exit;
    } else {
        // error_log("Error al registrar usuario: " . mysqli_error($conn));
        header("Location: ../registro.php?error=db_error"); // Necesitaremos añadir el toast a registro.php
        exit;
    }
    mysqli_stmt_close($stmt_insert);
}
?>
