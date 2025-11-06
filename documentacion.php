<?php
$html_content = '';
$markdown_file = 'Documentacion.md';

if (file_exists($markdown_file)) {
    $markdown_content = file_get_contents($markdown_file);

    // Usamos la librería Parsedown para convertir Markdown a HTML.
    if (file_exists('php/Parsedown.php')) {
        include_once 'php/Parsedown.php';
        $Parsedown = new Parsedown();
        $html_content = $Parsedown->text($markdown_content);
    } else {
        // Si no se encuentra Parsedown, mostramos el texto plano con formato básico.
        $html_content = '<h3>Error: No se encontró la librería Parsedown.php</h3><pre>' . htmlspecialchars($markdown_content) . '</pre>';
    }
} else {
    $html_content = '<h1>Error</h1><p>El archivo de documentación no fue encontrado.</p>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documentación del Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 960px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        h1, h2, h3 { border-bottom: 1px solid #dee2e6; padding-bottom: .5rem; margin-top: 1.5rem; }
        code { background-color: #e9ecef; padding: .2em .4em; border-radius: 3px; font-size: 90%; }
        pre { background-color: #e9ecef; padding: 1rem; border-radius: 5px; }
        pre code { padding: 0; background-color: transparent; }
    </style>
</head>
<body>

<div class="container my-5 p-4 p-md-5">
    <div class="d-flex justify-content-end mb-4">
        <a href="index.php" class="btn btn-outline-secondary">← Volver al Inicio</a>
    </div>
    
    <?php echo $html_content; ?>

</div>

</body>
</html>