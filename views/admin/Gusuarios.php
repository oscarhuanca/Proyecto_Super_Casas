<?php
if (!defined('ENTRADA_PERMITIDA')) define('ENTRADA_PERMITIDA', true);

$usuarios = isset($controller) ? $controller->listarUsuarios() : [];
?>

<!-- ✅ Funciones en ámbito GLOBAL, sin condiciones -->
<script type="text/javascript">
"use strict";

// ✅ LIMPIAR FORMULARIO
function limpiarFormulario() {
    try {
        document.getElementById('id_usuario').value = '';
        document.getElementById('nombre').value = '';
        document.getElementById('apellido').value = '';
        document.getElementById('correo').value = '';
        document.getElementById('telefono').value = '';
        document.getElementById('id_rol').value = '';
        document.getElementById('contrasena').value = '';
        
        document.getElementById('tituloFormulario').textContent = 'Nuevo Usuario';
        document.getElementById('contrasena').required = true;
    } catch(e) {
        console.error("Error limpiando:", e);
    }
}

// ✅ EDITAR USUARIO
function editarUsuario(id) {
    console.log("Editar usuario:", id);
    fetch('admin.php?modulo=obtener_usuario&id=' + id, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(datos => {
        if(datos.error) { alert("❌ " + datos.error); return; }
        document.getElementById('id_usuario').value = datos.id_usuario;
        document.getElementById('nombre').value = datos.nombre;
        document.getElementById('apellido').value = datos.apellido;
        document.getElementById('correo').value = datos.correo;
        document.getElementById('telefono').value = datos.telefono;
        document.getElementById('id_rol').value = datos.id_rol;
        document.getElementById('contrasena').value = '';
        document.getElementById('contrasena').required = false;
        document.getElementById('tituloFormulario').textContent = 'Editar Usuario';
    })
    .catch(err => {
        console.error(err);
        alert("❌ No se pudo cargar el usuario");
    });
}

// ✅ ACTIVAR / DESACTIVAR
function cambiarEstado(id, nuevoEstado) {
    console.log("Cambiar estado:", id, nuevoEstado);
    const accion = nuevoEstado === 'activo' ? 'activar_usuario' : 'desactivar_usuario';
    const texto = nuevoEstado === 'activo' ? 'activar' : 'desactivar';
    
    if(!confirm(`¿Seguro que quieres ${texto} este usuario?`)) return;

    const formData = new FormData();
    formData.append('id_usuario', id);

    fetch('admin.php?modulo=' + accion, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(msg => {
        alert(msg.trim());
        if(msg.includes('✅')) {
            limpiarFormulario();
            cargarModulo('Gusuarios');
        }
    })
    .catch(err => {
        console.error(err);
        alert("❌ Error al cambiar estado");
    });
}

// ✅ ELIMINAR
function eliminarUsuario(id) {
    if(!confirm("¿Eliminar este usuario? No se puede deshacer.")) return;

    const formData = new FormData();
    formData.append('id_usuario', id);

    fetch('admin.php?modulo=eliminar_usuario', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(msg => {
        alert(msg.trim());
        if(msg.includes('✅')) {
            limpiarFormulario();
            cargarModulo('Gusuarios');
        }
    })
    .catch(err => {
        console.error(err);
        alert("❌ Error al eliminar");
    });
}

// ✅ RECARGAR MÓDULO
function cargarModulo(modulo) {
    fetch('admin.php?modulo=' + modulo, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        const contenedor = document.getElementById('contenido-principal');
        if(contenedor) contenedor.innerHTML = html;
    })
    .catch(err => console.error(err));
}

// ✅ INICIO
window.addEventListener('load', function() {
    limpiarFormulario();

    const form = document.getElementById('formUsuario');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('id_usuario').value;
            const accion = id ? 'actualizar_usuario' : 'guardar_usuario';

            fetch('admin.php?modulo=' + accion, {
                method: 'POST',
                body: new FormData(this),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(msg => {
                alert(msg.trim());
                if(msg.includes('✅')) {
                    limpiarFormulario();
                    cargarModulo('Gusuarios');
                }
            })
            .catch(err => {
                console.error(err);
                alert("❌ Error al guardar");
            });
        });
    }
});
</script>

<div class="container-fluid mt-4">
    <h3 class="text-primary">Gestión de Usuarios</h3>
    <hr>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 id="tituloFormulario">Nuevo Usuario</h5>
        </div>
        <div class="card-body">
            <form id="formUsuario" autocomplete="off" novalidate>
                <input type="hidden" name="id_usuario" id="id_usuario">

                <!-- Campos trampa -->
                <input type="text" style="position:absolute; left:-9999px; top:-9999px;" tabindex="-1">
                <input type="password" style="position:absolute; left:-9999px; top:-9999px;" tabindex="-1">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required
                               value="" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required
                               value="" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required
                               value="" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contraseña <small>(dejar vacío para no cambiar)</small></label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena"
                               value="" autocomplete="new-password">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required
                               value="" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Rol</label>
                        <select class="form-select" id="id_rol" name="id_rol" required autocomplete="off">
                            <option value="" selected>Seleccione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Gerente</option>
                            <option value="3">Asesor</option>
                            <option value="4">Recepción</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Limpiar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Lista de Usuarios</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= $u['id_usuario'] ?></td>
                        <td><?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']) ?></td>
                        <td><?= htmlspecialchars($u['correo']) ?></td>
                        <td><?= htmlspecialchars($u['telefono']) ?></td>
                        <td><?= htmlspecialchars($u['rol']) ?></td>
                        <td>
                            <span class="badge <?= $u['estado'] === 'activo' ? 'bg-success' : 'bg-secondary' ?>">
                                <?= ucfirst($u['estado']) ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y', strtotime($u['fecha_registro'])) ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning me-1" onclick="editarUsuario(<?= $u['id_usuario'] ?>)">Editar</button>
                            <?php if ($u['estado'] === 'activo'): ?>
                                <button type="button" class="btn btn-sm btn-secondary me-1" onclick="cambiarEstado(<?= $u['id_usuario'] ?>, 'inactivo')">Desactivar</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-sm btn-success me-1" onclick="cambiarEstado(<?= $u['id_usuario'] ?>, 'activo')">Activar</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-sm btn-danger" onclick="eliminarUsuario(<?= $u['id_usuario'] ?>)">Eliminar</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>