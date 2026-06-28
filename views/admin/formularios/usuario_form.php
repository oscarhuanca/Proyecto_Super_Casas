<?php
// Inicializamos vacío SIEMPRE al principio
$usuario = [];

// Solo cargamos datos si es EDICIÓN y viene un ID válido
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    require_once __DIR__ . '/../../../config/database.php';
    require_once __DIR__ . '/../../../controllers/AdminController.php';
    $control = new AdminController();
    $datos = $control->obtenerUsuario();
    $usuario = json_decode($datos, true) ?: [];
}
?>

<form id="formUsuario" autocomplete="off" novalidate>
    <input type="hidden" name="id_usuario" value="<?= isset($usuario['id_usuario']) ? htmlspecialchars($usuario['id_usuario']) : '' ?>">

    <!-- Campos trampa para engañar al autocompletado -->
    <input type="text" name="fakeuser" style="position: absolute; top: -9999px; left: -9999px;">
    <input type="password" name="fakepass" style="position: absolute; top: -9999px; left: -9999px;">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required
               value="<?= isset($usuario['nombre']) ? htmlspecialchars($usuario['nombre']) : '' ?>"
               autocomplete="new-name">
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" required
               value="<?= isset($usuario['apellido']) ? htmlspecialchars($usuario['apellido']) : '' ?>"
               autocomplete="new-family-name">
    </div>

    <div class="mb-3">
        <label class="form-label">Correo Electrónico</label>
        <input type="email" name="correo" class="form-control" required
               value="<?= isset($usuario['correo']) ? htmlspecialchars($usuario['correo']) : '' ?>"
               autocomplete="off" data-form="nuevo">
    </div>

    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="contrasena" class="form-control"
               placeholder="<?= empty($usuario) ? 'Escriba la contraseña' : 'Deje vacío si no desea cambiarla' ?>"
               value="" autocomplete="new-password">
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" required
               value="<?= isset($usuario['telefono']) ? htmlspecialchars($usuario['telefono']) : '' ?>"
               autocomplete="new-tel">
    </div>

    <div class="mb-3">
        <label class="form-label">Rol</label>
        <select name="id_rol" class="form-select" required autocomplete="off">
            <option value="" <?= empty($usuario) ? 'selected' : '' ?>>Seleccione</option>
            <option value="1" <?= isset($usuario['id_rol']) && $usuario['id_rol'] == 1 ? 'selected' : '' ?>>Administrador</option>
            <option value="2" <?= isset($usuario['id_rol']) && $usuario['id_rol'] == 2 ? 'selected' : '' ?>>Vendedor</option>
            <option value="3" <?= isset($usuario['id_rol']) && $usuario['id_rol'] == 3 ? 'selected' : '' ?>>Propietario</option>
        </select>
    </div>

    <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-outline-secondary" id="btnLimpiar">Limpiar</button>
    </div>
</form>

<script>
// Al cargar el formulario, si es NUEVO USUARIO, forzamos vaciar los campos
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formUsuario');
    const idCampo = form.querySelector('input[name="id_usuario"]').value;

    // Si NO hay ID = es nuevo usuario, limpiamos TODO
    if (!idCampo) {
        form.reset();
        form.querySelectorAll('input').forEach(input => {
            if (input.type !== 'hidden') input.value = '';
        });
        form.querySelector('select').value = '';
    }

    // Botón limpiar manual
    document.getElementById('btnLimpiar').addEventListener('click', function() {
        form.reset();
        form.querySelectorAll('input').forEach(input => {
            if (input.type !== 'hidden') input.value = '';
        });
        form.querySelector('select').value = '';
    });
});

// Al abrir el modal, volvemos a limpiar
document.addEventListener('shown.bs.modal', function (e) {
    if (e.target.id === 'modalUsuario') {
        const form = document.getElementById('formUsuario');
        const idCampo = form.querySelector('input[name="id_usuario"]').value;
        if (!idCampo) {
            form.reset();
            form.querySelectorAll('input').forEach(i => { if(i.type !== 'hidden') i.value = ''; });
            form.querySelector('select').value = '';
        }
    }
});

// Enviar formulario
document.getElementById('formUsuario').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = this.id_usuario.value;
    const accion = id ? 'actualizar_usuario' : 'guardar_usuario';

    fetch('../../admin.php?modulo=' + accion, {
        method: 'POST',
        body: new FormData(this),
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(mensaje => {
        alert(mensaje.trim());
        if (mensaje.includes('✅')) {
            bootstrap.Modal.getInstance(document.getElementById('modalUsuario')).hide();
            cargarModulo('Gusuarios');
            // Limpiar después de guardar
            this.reset();
            this.querySelectorAll('input:not([type=hidden])').forEach(i => i.value = '');
            this.querySelector('select').value = '';
        }
    })
    .catch(err => {
        console.error(err);
        alert('❌ Error al procesar los datos');
    });
});
</script>