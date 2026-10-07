<?php
// public/index.php

// Definir la ruta base del sistema
define('ROOT_PATH', dirname(__DIR__));

// Mensaje de diagnóstico inicial para el ERP
$titulo = "ERP Contable - Entorno de Desarrollo";
$fechaActual = date('Y-m-d H:i:s');
$phpVersion = PHP_VERSION;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <style>
        body { font-family: system-ui, sans-serif; background-color: #f4f6f9; color: #333; padding: 2rem; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto; }
        h1 { color: #1e3a8a; margin-top: 0; }
        .badge { display: inline-block; padding: 0.25rem 0.5rem; background: #e0f2fe; color: #0369a1; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h1><?php echo $titulo; ?></h1>
        <p>El servidor local embebido de PHP está respondiendo satisfactoriamente.</p>
        <hr>
        <p><strong>Versión de PHP activa:</strong> <span class="badge"><?php echo $phpVersion; ?></span></p>
        <p><strong>Ruta raíz del proyecto:</strong> <code><?php echo ROOT_PATH; ?></code></p>
        <p><strong>Marca de tiempo del servidor:</strong> <?php echo $fechaActual; ?></p>
    </div>
</body>
</html>