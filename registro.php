<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrarse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/login.css" />
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

  <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
    <h2 class="mb-4 text-center">Crear cuenta</h2>
    
    <form action="php/registro.php" method="POST">
      
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-success w-100">Registrarme</button>
    </form>

    <p class="mt-3 text-center">
      ¿Ya tenés cuenta? <a href="login.php">Iniciá sesión</a>
    </p>
  </div>

</body>
</html>
