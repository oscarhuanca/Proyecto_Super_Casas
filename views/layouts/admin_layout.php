<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - Super Casas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #212529; color: #fff; }
        .nav-link { color: #adb5bd; }
        .nav-link:hover { color: #fff; background: #343a40; }
        .main-panel { padding: 20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar p-3">
                <h4>Admin SAPN</h4>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php?action=propiedades">Propiedades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contactos</a></li>
                    <li class="nav-item mt-5"><a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
            <main class="col-md-10 main-panel">
                <?php echo $contenido; ?>
            </main>
        </div>
    </div>
</body>
</html>