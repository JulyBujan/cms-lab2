<?php
include_once "php/seguridad.php";
include_once "php/conexion.php";

// Solo los administradores (rol 2) pueden acceder a esta página.
verificar_rol(2);

$id_admin_actual = $_SESSION["id_usuario"];

// Obtener todos los usuarios de la base de datos
$sql = "SELECT id, nombre, email, role, status FROM usuarios ORDER BY id ASC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Mapeo de roles y estados para mostrarlos de forma legible
$roles = [
    0 => "Publicador",
    1 => "Invitado",
    2 => "Administrador"
];

$estados = [
    0 => "Inactivo",
    1 => "Activo"
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notificación</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <!-- El mensaje del toast se inyectará aquí -->
    </div>
  </div>
</div>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestión de Usuarios</h2>
        <a href="home.php" class="btn btn-secondary">Volver al Inicio</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <form action="php/actualizar_usuario.php" method="POST">
                            <input type="hidden" name="id_usuario_mod" value="<?php echo $usuario['id']; ?>">
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td>
                                <select name="role" class="form-select form-select-sm" <?php if ($usuario['id'] == $id_admin_actual) echo 'disabled'; ?>>
                                    <?php foreach ($roles as $num => $nombre): ?>
                                        <option value="<?php echo $num; ?>" <?php if ($usuario['role'] == $num) echo 'selected'; ?>><?php echo $nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="status" class="form-select form-select-sm">
                                    <?php foreach ($estados as $num => $nombre): ?>
                                        <option value="<?php echo $num; ?>" <?php if ($usuario['status'] == $num) echo 'selected'; ?>><?php echo $nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm" <?php if ($usuario['id'] == $id_admin_actual) echo 'disabled'; ?>>Actualizar</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Nuestro manejador de toasts centralizado -->
<script src="js/toast_handler.js"></script>
</body>
</html>
