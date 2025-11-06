<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
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
    <div class="card p-4 shadow login-card">
        <h2 class="text-center mb-4">¡Bienvenido de nuevo!</h2>

        <form action="php/login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Ingresar</button>
        </form>

        <p class="mt-3 text-center">
            ¿No tenés cuenta? <a href="registro.php">Registrate aquí</a>
        </p>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-sm btn-outline-secondary">← Volver al inicio</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Nuestro manejador de toasts centralizado -->
<script src="js/toast_handler.js"></script>

</body>
</html>
