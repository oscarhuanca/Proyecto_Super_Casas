<?php
if (!defined('ENTRADA_PERMITIDA')) define('ENTRADA_PERMITIDA', true);
?>

<div class="container-fluid mt-4">
    <h2 class="text-primary">Gestión de Talento Humano</h2>
    <p class="text-muted mb-4">Administración de personal, capacitaciones y evaluaciones.</p>

    <!-- 📌 SUBMENÚ FIJO Y FUNCIONANDO -->
    <div class="d-flex flex-wrap gap-3 mb-4 p-2 bg-light rounded border">
        <button type="button" id="btn_registro" class="btn btn-outline-primary"
            onclick="
                document.getElementById('mensaje_inicio').style.display = 'none';
                document.getElementById('sec_registro').style.display = 'block';
                document.getElementById('sec_capacitacion').style.display = 'none';
                document.getElementById('sec_evaluacion').style.display = 'none';

                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-primary');
                document.getElementById('btn_cap').classList.remove('btn-success');
                document.getElementById('btn_cap').classList.add('btn-outline-success');
                document.getElementById('btn_eva').classList.remove('btn-info');
                document.getElementById('btn_eva').classList.add('btn-outline-info');
            ">
            📋 Registro de Personal
        </button>

        <button type="button" id="btn_cap" class="btn btn-outline-success"
            onclick="
                document.getElementById('mensaje_inicio').style.display = 'none';
                document.getElementById('sec_registro').style.display = 'none';
                document.getElementById('sec_capacitacion').style.display = 'block';
                document.getElementById('sec_evaluacion').style.display = 'none';

                this.classList.remove('btn-outline-success');
                this.classList.add('btn-success');
                document.getElementById('btn_registro').classList.remove('btn-primary');
                document.getElementById('btn_registro').classList.add('btn-outline-primary');
                document.getElementById('btn_eva').classList.remove('btn-info');
                document.getElementById('btn_eva').classList.add('btn-outline-info');
            ">
            🎓 Capacitación de Personal
        </button>

        <button type="button" id="btn_eva" class="btn btn-outline-info"
            onclick="
                document.getElementById('mensaje_inicio').style.display = 'none';
                document.getElementById('sec_registro').style.display = 'none';
                document.getElementById('sec_capacitacion').style.display = 'none';
                document.getElementById('sec_evaluacion').style.display = 'block';

                this.classList.remove('btn-outline-info');
                this.classList.add('btn-info');
                document.getElementById('btn_registro').classList.remove('btn-primary');
                document.getElementById('btn_registro').classList.add('btn-outline-primary');
                document.getElementById('btn_cap').classList.remove('btn-success');
                document.getElementById('btn_cap').classList.add('btn-outline-success');
            ">
            📊 Evaluación de Personal
        </button>
    </div>

    <!-- 📌 ÁREA DE CONTENIDO -->
    <div style="min-height: 450px;">
        <!-- ✅ MENSAJE INICIAL AL ENTRAR -->
        <div id="mensaje_inicio" class="text-center text-muted py-5 border rounded bg-white">
            <h5>Selecciona una opción del menú superior para comenzar</h5>
        </div>

        <!-- ============================================== -->
        <!-- ✅ SECCIÓN 1: REGISTRO DE PERSONAL -->
        <!-- ============================================== -->
        <div id="sec_registro" style="display: none; margin-top: 1.5rem;">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 id="tituloFormPersonal">Nuevo Personal</h5>
                </div>
                <div class="card-body">
                    <form id="formPersonal" autocomplete="off" novalidate>
                        <input type="hidden" name="id_personal" id="id_personal" value="">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" maxlength="150" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Cédula de Identidad *</label>
                                <input type="text" class="form-control" id="ci" name="ci" maxlength="20" required>
                            </div>
                            <!-- ✅ CAMBIO: CARGO COMO LISTA DESPLEGABLE -->
                            <div class="col-md-3">
                                <label class="form-label">Cargo *</label>
                                <select class="form-select" id="cargo" name="cargo" required>
                                    <option value="">Seleccione</option>
                                    <option value="Gerente General">Gerente General</option>
                                    <option value="Jefe de Administración">Jefe de Administración</option>
                                    <option value="Jefe de Talento Humano">Jefe de Talento Humano</option>
                                    <option value="Contador">Contador</option>
                                    <option value="Auxiliar Contable">Auxiliar Contable</option>
                                    <option value="Asesor inmobiliario">Asesor inmobiliario</option>
                                    <option value="Tecnico Valuador">Tecnico Valuador</option>
                                    <option value="Cajero">Cajero</option>
                                    <option value="Limpieza y Mantenimiento">Limpieza y Mantenimiento</option>
                                    <option value="Seguridad">Seguridad</option>
                                    <option value="Sistemas">Sistemas</option>
                                    <option value="Atención al Cliente">Atención al Cliente</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Fecha de Ingreso *</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Estado Civil *</label>
                                <select class="form-select" id="estado_civil" name="estado_civil" required>
                                    <option value="">Seleccione</option>
                                    <option value="soltero">Soltero/a</option>
                                    <option value="casado">Casado/a</option>
                                    <option value="conviviente">Conviviente</option>
                                    <option value="divorciado">Divorciado/a</option>
                                    <option value="viudo">Viudo/a</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Estado del Contrato *</label>
                                <select class="form-select" id="estado_contrato" name="estado_contrato" required>
                                    <option value="">Seleccione</option>
                                    <option value="activo" selected>Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                    <option value="suspendido">Suspendido</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="20">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email_corporativo" name="email_corporativo" 
                                    maxlength="100" placeholder="ejemplo@dominio.com">
                                <small class="text-muted">Puede ser correo personal o de otro proveedor</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Usuario Asociado</label>
                                <select class="form-select" id="usuario_id" name="usuario_id">
                                    <option value="" selected>Sin usuario asociado</option>
                                    <!-- Se asignará más adelante desde Gestión de Usuarios -->
                                </select>
                                <small class="text-muted">Se asigna cuando el personal está activo</small>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>

            <!-- Lista de Personal -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5>Lista de Personal Registrado</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Cédula</th>
                                <th>Cargo</th>
                                <th>Ingreso</th>
                                <th>Estado Civil</th>
                                <th>Contrato</th>
                                <th>Teléfono</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPersonal">
                            <tr>
                                <td colspan="10" class="text-center text-muted py-3">Aún no hay personal registrado</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECCIÓN 2: CAPACITACIÓN DE PERSONAL -->
        <!-- ============================================== -->
        <div id="sec_capacitacion" style="display: none; margin-top: 1.5rem;">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5>Programación y Registro de Capacitaciones</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="limpiarCapacitacion()">Nueva Capacitación</button>
                </div>
                <div class="card-body">
                    <form id="formCapacitacion" autocomplete="off" novalidate>
                        <input type="hidden" name="id_capacitacion" id="id_capacitacion" value="">

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Título del Curso / Taller *</label>
                                <input type="text" class="form-control" id="titulo_cap" name="titulo" maxlength="150" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tipo de Actividad *</label>
                                <select class="form-select" id="tipo_cap" name="tipo" required>
                                    <option value="">Seleccione</option>
                                    <option value="Curso">Curso</option>
                                    <option value="Taller">Taller</option>
                                    <option value="Charla">Charla</option>
                                    <option value="Seminario">Seminario</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Facilitador / Institución</label>
                                <input type="text" class="form-control" id="facilitador_cap" name="facilitador" maxlength="150">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Fecha Programada *</label>
                                <input type="date" class="form-control" id="fecha_cap" name="fecha_programada" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Duración (horas)</label>
                                <input type="number" class="form-control" id="duracion_cap" name="duracion_horas" min="1" max="500">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Estado de la Actividad</label>
                                <select class="form-select" id="estado_cap" name="estado">
                                    <option value="programada" selected>Programada</option>
                                    <option value="realizada">Realizada</option>
                                    <option value="cancelada">Cancelada</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Modalidad</label>
                                <select class="form-select" id="modalidad_cap" name="modalidad">
                                    <option value="presencial">Presencial</option>
                                    <option value="virtual">Virtual</option>
                                    <option value="mixta">Mixta</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Enlace de Video (YouTube)</label>
                                <input type="url" class="form-control" id="url_video_cap" name="url_video" 
                                       placeholder="https://youtube.com/...">
                                <small class="text-muted">Enlace al video de la capacitación</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Archivo de Presentación / Material</label>
                                <input type="text" class="form-control" id="archivo_cap" name="archivo_material" 
                                       placeholder="Ruta o enlace al archivo">
                                <small class="text-muted">Ubicación de la presentación o documentos</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Objetivos y Temario</label>
                                <textarea class="form-control" id="descripcion_cap" name="descripcion" rows="3" maxlength="500" 
                                          placeholder="Describa los temas a tratar y objetivos"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Participantes Seleccionados</label>
                                <select class="form-select" id="participantes_cap" name="participantes[]" multiple size="4">
                                    <option value="">--- Seleccione personal ---</option>
                                    <!-- Aquí se cargará automáticamente el personal activo -->
                                </select>
                                <small class="text-muted">Mantenga presionada la tecla Ctrl para seleccionar varios</small>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-success">Guardar Capacitación</button>
                            <button type="button" class="btn btn-secondary" onclick="limpiarCapacitacion()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>

            <!-- Lista de Capacitaciones -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5>Historial de Capacitaciones</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Facilitador</th>
                                <th>Estado</th>
                                <th>Participantes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCapacitaciones">
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">Aún no hay capacitaciones registradas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECCIÓN 3: EVALUACIÓN DE DESEMPEÑO Y KPIs -->
        <!-- ============================================== -->
        <div id="sec_evaluacion" style="display: none; margin-top: 1.5rem;">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5>Evaluación de Desempeño y KPIs</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="limpiarEvaluacion()">Nueva Evaluación</button>
                </div>
                <div class="card-body">
                    <form id="formEvaluacion" autocomplete="off" novalidate>
                        <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="">

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Personal a Evaluar *</label>
                                <select class="form-select" id="id_personal_eva" name="id_personal" required>
                                    <option value="">Seleccione el personal</option>
                                    <!-- Se cargará el personal activo -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Periodo de Evaluación *</label>
                                <select class="form-select" id="periodo_eva" name="periodo" required>
                                    <option value="">Seleccione</option>
                                    <option value="Enero - Junio 2026">Enero - Junio 2026</option>
                                    <option value="Julio - Diciembre 2026">Julio - Diciembre 2026</option>
                                    <option value="Enero - Junio 2027">Enero - Junio 2027</option>
                                    <option value="Anual 2026">Anual 2026</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Fecha de la Evaluación *</label>
                                <input type="date" class="form-control" id="fecha_eva" name="fecha_evaluacion" required>
                            </div>

                            <!-- KPIs Generales -->
                            <div class="col-md-12 mt-3">
                                <h6 class="border-bottom pb-2">Indicadores Generales (1 a 10)</h6>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Cumplimiento de Tareas</label>
                                <input type="number" class="form-control" id="kpi_cumplimiento" name="kpi_cumplimiento" min="1" max="10" value="5">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Responsabilidad</label>
                                <input type="number" class="form-control" id="kpi_responsabilidad" name="kpi_responsabilidad" min="1" max="10" value="5">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Puntualidad y Asistencia</label>
                                <input type="number" class="form-control" id="kpi_puntualidad" name="kpi_puntualidad" min="1" max="10" value="5">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Relación con Clientes</label>
                                <input type="number" class="form-control" id="kpi_atencion" name="kpi_atencion" min="1" max="10" value="5">
                            </div>

                            <!-- KPIs Específicos por Cargo -->
                            <div class="col-md-12 mt-3">
                                <h6 class="border-bottom pb-2">KPIs Específicos</h6>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Cumplimiento de Metas</label>
                                <input type="number" class="form-control" id="kpi_metas" name="kpi_metas" min="1" max="10" value="5">
                                <small class="text-muted">Ventas, valoraciones, gestiones según cargo</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Calidad del Trabajo</label>
                                <input type="number" class="form-control" id="kpi_calidad" name="kpi_calidad" min="1" max="10" value="5">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Trabajo en Equipo</label>
                                <input type="number" class="form-control" id="kpi_equipo" name="kpi_equipo" min="1" max="10" value="5">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Observaciones y Comentarios</label>
                                <textarea class="form-control" id="observaciones_eva" name="observaciones" rows="3" maxlength="500"></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Puntaje Final</label>
                                <input type="text" class="form-control bg-light fw-bold" id="puntaje_final_eva" readonly value="0.0">
                                <small class="text-muted">Promedio automático</small>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Resultado</label>
                                <input type="text" class="form-control bg-light fw-bold" id="resultado_eva" readonly>
                                <small class="text-muted">Bajo / Regular / Bueno / Excelente</small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Recomendaciones</label>
                                <select class="form-select" id="recomendacion_eva" name="recomendacion">
                                    <option value="mantener">Mantener en el cargo</option>
                                    <option value="mejorar">Plan de mejora</option>
                                    <option value="capacitar">Requiere capacitación específica</option>
                                    <option value="ascender">Posible ascenso</option>
                                    <option value="finalizar">Evaluar continuidad</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-info">Guardar Evaluación</button>
                            <button type="button" class="btn btn-secondary" onclick="limpiarEvaluacion()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>

            <!-- Lista de Evaluaciones -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5>Historial de Evaluaciones</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Personal</th>
                                <th>Cargo</th>
                                <th>Periodo</th>
                                <th>Puntaje</th>
                                <th>Resultado</th>
                                <th>Recomendación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaEvaluaciones">
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">Aún no hay evaluaciones registradas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ FUNCIONES JAVASCRIPT ACTUALIZADAS -->
<script type="text/javascript">
"use strict";

// --- FUNCIONES REGISTRO DE PERSONAL ---
function limpiarFormulario() {
    document.getElementById('id_personal').value = '';
    document.getElementById('nombre_completo').value = '';
    document.getElementById('ci').value = '';
    document.getElementById('cargo').value = '';
    document.getElementById('fecha_ingreso').value = '';
    document.getElementById('estado_civil').value = '';
    document.getElementById('estado_contrato').value = 'activo';
    document.getElementById('telefono').value = '';
    document.getElementById('email_corporativo').value = '';
    document.getElementById('usuario_id').value = '';
    document.getElementById('tituloFormPersonal').textContent = 'Nuevo Personal';
}

// Envío del formulario de personal
document.addEventListener('submit', function(e) {
    if (e.target.id === 'formPersonal') {
        e.preventDefault();
        const datos = new FormData(e.target);

        fetch('admin.php?modulo=guardar_personal', {
            method: 'POST',
            body: datos,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(msj => {
            alert(msj.trim());
            if (msj.includes('✅')) {
                limpiarFormulario();
                cargarListaPersonal();
            }
        })
        .catch(err => {
            console.error(err);
            alert('❌ Error al procesar la solicitud');
        });
    }
});

function cargarListaPersonal() {
    fetch('admin.php?modulo=listar_personal', {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('tablaPersonal').innerHTML = html;
    })
    .catch(err => console.error(err));
}

function editarPersonal(id) {
    fetch(`admin.php?modulo=obtener_personal&id=${id}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.json())
    .then(datos => {
        if (datos.error) { alert('❌ ' + datos.error); return; }
        document.getElementById('id_personal').value = datos.id_personal;
        document.getElementById('nombre_completo').value = datos.nombre_completo;
        document.getElementById('ci').value = datos.ci;
        document.getElementById('cargo').value = datos.cargo || '';
        document.getElementById('fecha_ingreso').value = datos.fecha_ingreso;
        document.getElementById('estado_civil').value = datos.estado_civil || '';
        document.getElementById('estado_contrato').value = datos.estado_contrato;
        document.getElementById('telefono').value = datos.telefono || '';
        document.getElementById('email_corporativo').value = datos.email_corporativo || '';
        document.getElementById('usuario_id').value = datos.usuario_id || '';
        document.getElementById('tituloFormPersonal').textContent = 'Editar Personal';
    })
    .catch(err => {
        console.error(err);
        alert('❌ No se pudo cargar el registro');
    });
}

function eliminarPersonal(id) {
    if (!confirm('¿Seguro que desea eliminar este registro? Esta acción no se puede deshacer.')) return;

    const form = new FormData();
    form.append('id_personal', id);

    fetch('admin.php?modulo=eliminar_personal', {
        method: 'POST',
        body: form,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(msj => {
        alert(msj.trim());
        if (msj.includes('✅')) cargarListaPersonal();
    })
    .catch(err => {
        console.error(err);
        alert('❌ Error al eliminar');
    });
}

// --- FUNCIONES CAPACITACIÓN ---
function limpiarCapacitacion() {
    document.getElementById('id_capacitacion').value = '';
    document.getElementById('titulo_cap').value = '';
    document.getElementById('tipo_cap').value = '';
    document.getElementById('facilitador_cap').value = '';
    document.getElementById('fecha_cap').value = '';
    document.getElementById('duracion_cap').value = '';
    document.getElementById('estado_cap').value = 'programada';
    document.getElementById('modalidad_cap').value = 'presencial';
    document.getElementById('url_video_cap').value = '';
    document.getElementById('archivo_cap').value = '';
    document.getElementById('descripcion_cap').value = '';
    document.getElementById('participantes_cap').selectedIndex = -1;
}

// --- FUNCIONES EVALUACIÓN ---
function limpiarEvaluacion() {
    document.getElementById('id_evaluacion').value = '';
    document.getElementById('id_personal_eva').value = '';
    document.getElementById('periodo_eva').value = '';
    document.getElementById('fecha_eva').value = '';
    document.getElementById('kpi_cumplimiento').value = '5';
    document.getElementById('kpi_responsabilidad').value = '5';
    document.getElementById('kpi_puntualidad').value = '5';
    document.getElementById('kpi_atencion').value = '5';
    document.getElementById('kpi_metas').value = '5';
    document.getElementById('kpi_calidad').value = '5';
    document.getElementById('kpi_equipo').value = '5';
    document.getElementById('observaciones_eva').value = '';
    document.getElementById('puntaje_final_eva').value = '0.0';
    document.getElementById('resultado_eva').value = '';
    document.getElementById('recomendacion_eva').value = 'mantener';
}

// Cálculo automático del puntaje y resultado en evaluación
function calcularResultadoEvaluacion() {
    const campos = [
        'kpi_cumplimiento', 'kpi_responsabilidad', 'kpi_puntualidad',
        'kpi_atencion', 'kpi_metas', 'kpi_calidad', 'kpi_equipo'
    ];

    let total = 0;
    let conteo = 0;

    campos.forEach(id => {
        const valor = parseInt(document.getElementById(id).value) || 0;
        if (valor >= 1 && valor <= 10) {
            total += valor;
            conteo++;
        }
    });

    const promedio = conteo > 0 ? (total / conteo).toFixed(1) : '0.0';
    document.getElementById('puntaje_final_eva').value = promedio;

    let resultado = '';
    if (promedio >= 9) resultado = 'Excelente';
    else if (promedio >= 7.5) resultado = 'Bueno';
    else if (promedio >= 6) resultado = 'Regular';
    else resultado = 'Bajo';

    document.getElementById('resultado_eva').value = resultado;
}

// Activar cálculo automático al cambiar cualquier KPI
document.querySelectorAll('#formEvaluacion input[type="number"]').forEach(input => {
    input.addEventListener('input', calcularResultadoEvaluacion);
});
</script>