<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

include_once "php/conexion.php";

$id_usuario = $_SESSION["id_usuario"];
$nombre     = $_SESSION["nombre"];

// ¿Está viendo solo sus publicaciones?
$solo_mias = isset($_GET["mis"]) && $_GET["mis"] == 1;

if ($solo_mias) {
    $sql = "SELECT p.*, u.nombre AS autor FROM publicaciones p
            JOIN usuarios u ON p.id_usuario = u.id
            WHERE p.estado = 1 AND p.id_usuario = '$id_usuario'
            ORDER BY p.fecha DESC";
} else {
    $sql = "SELECT p.*, u.nombre AS autor FROM publicaciones p
            JOIN usuarios u ON p.id_usuario = u.id
            WHERE p.estado = 1
            ORDER BY p.fecha DESC";
}

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Bienvenido/a, <?php echo htmlspecialchars($nombre); ?> 👋</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="nueva.php" class="btn btn-success">+ Nueva publicación</a>

            <?php if ($solo_mias): ?>
                <a href="home.php" class="btn btn-secondary">Ver todas</a>
            <?php else: ?>
                <a href="home.php?mis=1" class="btn btn-warning">Mis publicaciones</a>
            <?php endif; ?>
        </div>
        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <hr>
    <h5 class="text-muted">
        <?php echo $solo_mias ? "Tus publicaciones" : "Feed general"; ?>
    </h5>

    <?php while ($pub = mysqli_fetch_assoc($resultado)): ?>
        <div class="card mb-3">
            <?php if (!empty($pub["imagen"])): ?>
                <img src="img/<?php echo htmlspecialchars($pub["imagen"]); ?>" class="card-img-top" style="max-height: 300px; object-fit: cover;">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($pub["titulo"]); ?></h5>
                <div class="card-text"><?php echo nl2br($pub["contenido"]); ?></div>

                <p class="card-text"><small class="text-muted">Publicado por <?php echo htmlspecialchars($pub["autor"]); ?> el <?php echo $pub["fecha"]; ?></small></p>

                <?php if ($pub["id_usuario"] == $id_usuario): ?>
                    <a href="editar.php?id=<?php echo $pub["id"]; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="php/borrar_publicacion.php?id=<?php echo $pub["id"]; ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
