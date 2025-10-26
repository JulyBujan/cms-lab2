<?php
session_start();
include_once "php/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
$id = $_GET["id"] ?? null;

// Buscar publicación
$sql = "SELECT * FROM publicaciones WHERE id = '$id' AND id_usuario = '$id_usuario' AND estado = 1";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) != 1) {
    echo "Publicación no encontrada o no autorizada.";
    exit;
}

$pub = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#contenido',
            menubar: false,
            plugins: 'lists link image',
            toolbar: 'undo redo | bold italic underline | bullist numlist | link',
            branding: false
        });
    </script>
</head>
<body>

<div class="container mt-4">
    <h2>Editar publicación</h2>

    <form action="php/editar_publicacion.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $pub['id']; ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo htmlspecialchars($pub['titulo']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea id="contenido" name="contenido" class="form-control" rows="6"><?php echo htmlspecialchars($pub["contenido"]); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
            <?php if ($pub["imagen"]): ?>
                <p class="mt-2">Imagen actual: <img src="publicaciones/<?php echo $pub["imagen"]; ?>" width="100"></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-warning">Guardar cambios</button>
        <a href="home.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
