<?php
session_start();
if (isset($_SESSION["id_usuario"])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notificación</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"></div>
  </div>
</div>

<div class="login-container d-flex align-items-center justify-content-center">
    <div class="card p-5 shadow login-card text-center" style="width: 100%; max-width: 500px;">

        <h1 class="mb-3">Bienvenido a Nuestro CMS</h1>
        <p class="lead mb-4">Gestiona tus publicaciones de una manera fácil y sencilla.</p>
        <div class="d-grid gap-3">
            <a href="login.php" class="btn btn-primary btn-lg">Ingresar</a>
            <a href="registro.php" class="btn btn-success btn-lg">Registrarse</a>
            <a href="documentacion.php" class="btn btn-outline-info mt-2">Ver Documentación</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Nuestro manejador de toasts centralizado -->
<script src="js/toast_handler.js"></script>

</body>
</html>