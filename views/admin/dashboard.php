<?php
// 1. Iniciamos el buffer
ob_start();
?>

<h2 class="mb-4">Panel de Administración</h2>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card p-3 border-success shadow-sm">
            <h5>Propiedades Activas</h5>
            <h2 class="text-success"><?php echo $totalPropiedades; ?></h2>
        </div>
    </div>
</div>

<?php
// 2. Capturamos todo el HTML anterior y lo guardamos en la variable $contenido
$contenido = ob_get_clean();

// 3. Cargamos el layout que "flota". 
// Ajusta esta ruta si es necesario para que encuentre el archivo admin_layout.php
include __DIR__ . '/../layouts/admin_layout.php';
?>