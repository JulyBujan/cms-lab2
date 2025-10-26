<?php
$host = "192.168.71.151";
$user = "cms_user";
$pass = "dexterlab";
$db   = "cms";

// Crear conexión
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
