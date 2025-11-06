<?php
include_once "php/seguridad.php";
include_once "php/conexion.php";

// Solo los administradores (rol 2) pueden acceder a esta página.
verificar_rol(2);

// Obtener todas las publicaciones, incluyendo el nombre del autor
$sql = "SELECT p.id, p.titulo, p.estado, u.nombre AS autor 
        FROM publicaciones p 
        JOIN usuarios u ON p.id_usuario = u.id 
        ORDER BY p.fecha DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Mapeo de estados para el dropdown
$estados = [
    0 => "Inactivo",
    1 => "Activo"
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Publicaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestión de Publicaciones</h2>
        <a href="home.php" class="btn btn-secondary">Volver al Inicio</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Estado</th>
                    <th style="width: 150px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pub = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <form action="php/actualizar_publicacion_estado.php" method="POST">
                            <input type="hidden" name="id_publicacion" value="<?php echo $pub['id']; ?>">
                            
                            <td><?php echo htmlspecialchars($pub['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($pub['autor']); ?></td>
                            <td>
                                <select name="estado" class="form-select form-select-sm">
                                    <?php foreach ($estados as $num => $nombre): ?>
                                        <option value="<?php echo $num; ?>" <?php if ($pub['estado'] == $num) echo 'selected'; ?>>
                                            <?php echo $nombre; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
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