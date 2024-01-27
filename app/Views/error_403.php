<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Error: 403 - Acceso denegado</title>
    <!-- Incluir el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Incluir el archivo CSS de Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" crossorigin="anonymous">
    <!-- Estilo personalizado -->
    <style>
        .container {
            max-width: 600px;
            margin-top: 100px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 3rem;
            color: #dc3545;
        }

        .card-text {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .card-link {
            font-size: 1rem;
            color: #007bff;
        }
    </style>
</head>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-lock"></i> Sin acceso</h1>
                        <p class="card-text">No tiene permiso para acceder a esta página.</p>
                        <a href="<?= base_url() ?>inicio" class="card-link">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </main>