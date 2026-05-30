<?php
// Reportar errores para saber qué falla exactamente
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Definir la ruta base para evitar problemas de carpetas
define('CONTROLADORES', 'controllers/');
define('MODELOS', 'models/');
define('VISTAS', 'views/');
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Super Casas S.R.L.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body>

    <?php
        // 1. Cargar el Header (Las dos barras superiores)
        $headerPath = VISTAS . "modulos/header.php";
        if (file_exists($headerPath)) {
            include_once $headerPath;
        } else {
            echo "<div class='container mt-3'><div class='alert alert-danger'>Error: No se encuentra el header en: $headerPath</div></div>";
        }
    ?>

    <?php
        $inicioPath = VISTAS . "inmuebles/inicio.php";
        if (file_exists($inicioPath)) {
            include_once $inicioPath;
        } else {
            echo "<div class='container mt-3'><div class='alert alert-danger'>Error: No se encuentra el archivo de inicio en: $inicioPath</div></div>";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Estructura del Modal (Invisible por defecto) -->
<div id="login-modal" class="modal-overlay">
    <div class="login-box">
        <span onclick="cerrarModal()" style="cursor:pointer; float:right; font-size:20px;">&times;</span>
        <img src="assets/img/logo.jpeg" alt="Logo" style="max-width: 100px; margin-bottom:15px;">
        <h3 style="margin-bottom: 5px;">Iniciar Sesión</h3>
        <p>SAPN Super Casas S.R.L.</p>
        <form method="POST" action="views/login.php">
            <input type="text" name="usuario" placeholder="Correo electrónico" required style="width:100%; margin-bottom:10px;">
            <input type="password" name="password" placeholder="Contraseña" required style="width:100%; margin-bottom:10px;">
            <button type="submit" style="width:100%; background:#28a745; color:white; border:none; padding:10px;">INGRESAR</button>
        </form>
        <a href="views/recuperar.php" style="display:block; margin-top:10px; color:#28a745;">¿Olvidaste tu contraseña? Clic aquí</a>
    </div>
</div>
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegistroLabel">Registro de Interesado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guardar_registro.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nombre completo *</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">Enviar Registro</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.querySelector('[data-bs-target="#modalRegistro"]');
    if (btn) {
        btn.addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modalRegistro'));
            myModal.show();
        });
    }
});
</script>

<script>
    // Prueba esto: al hacer clic en cualquier cosa, veremos qué pasa en la consola
    document.addEventListener('click', function(e) {
        if(e.target.matches('[data-bs-target="#modalRegistro"]')) {
            console.log("¡Clic detectado en el botón!");
            var myModal = new bootstrap.Modal(document.getElementById('modalRegistro'));
            myModal.show();
        }
    });
</script>

</body>
</html>