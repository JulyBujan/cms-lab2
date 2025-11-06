<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- TinyMCE para texto enriquecido -->
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

<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header text-bg-danger">
      <strong class="me-auto">Error de validación</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Por favor, escribí contenido para tu publicación.
    </div>
  </div>
</div>
<div class="container mt-4">
    <h2>Nueva publicación</h2>

    <form action="php/crear_publicacion.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea id="contenido" name="contenido" class="form-control" rows="6"></textarea>

        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Publicar</button>
        <a href="home.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelector("form").addEventListener("submit", function(e) {
    const contenido = tinyMCE.get("contenido").getContent({format: "text"}).trim();
    if (contenido === "") {
        e.preventDefault();
        const toastLiveExample = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
    }
});
</script>


</body>
</html>
