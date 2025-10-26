<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

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
    </div>
</div>

<div class="modal fade" id="registroExitoso" tabindex="-1" aria-labelledby="registroExitosoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title" id="registroExitosoLabel">¡Registro exitoso! 🎉</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Tu cuenta fue creada correctamente. Ya podés iniciar sesión.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<?php if (isset($_GET['registro']) && $_GET['registro'] == 'ok'): ?>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const modal = new bootstrap.Modal(document.getElementById('registroExitoso'));
      modal.show();
    });
  </script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
