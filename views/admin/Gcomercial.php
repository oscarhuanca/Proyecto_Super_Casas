<?php
if (!defined('ENTRADA_PERMITIDA')) define('ENTRADA_PERMITIDA', true);
?>

<div class="container-fluid mt-4">
    <h2 class="text-primary">Gestión Comercial</h2>
    <p class="text-muted mb-4">Administración de propiedades, clientes, contratos, pagos y reportes financieros.</p>

    <!-- 📌 SUBMENÚ -->
    <div class="d-flex flex-wrap gap-3 mb-4 p-2 bg-light rounded border">
        <button type="button" id="btn_propiedades" class="btn btn-outline-primary"
            onclick="
                document.getElementById('mensaje_inicio_comercial').style.display = 'none';
                document.getElementById('sec_propiedades').style.display = 'block';
                document.getElementById('sec_clientes').style.display = 'none';
                document.getElementById('sec_contratos').style.display = 'none';
                document.getElementById('sec_ventas').style.display = 'none';

                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-primary');
                document.getElementById('btn_clientes').classList.remove('btn-secondary');
                document.getElementById('btn_clientes').classList.add('btn-outline-secondary');
                document.getElementById('btn_contratos').classList.remove('btn-secondary');
                document.getElementById('btn_contratos').classList.add('btn-outline-secondary');
                document.getElementById('btn_ventas').classList.remove('btn-secondary');
                document.getElementById('btn_ventas').classList.add('btn-outline-secondary');

                cargarListaPropiedades();
            ">
            🏠 Gestión de Propiedades
        </button>

        <button type="button" id="btn_clientes" class="btn btn-outline-secondary"
            onclick="
                document.getElementById('mensaje_inicio_comercial').style.display = 'none';
                document.getElementById('sec_propiedades').style.display = 'none';
                document.getElementById('sec_clientes').style.display = 'block';
                document.getElementById('sec_contratos').style.display = 'none';
                document.getElementById('sec_ventas').style.display = 'none';

                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-secondary');
                document.getElementById('btn_propiedades').classList.remove('btn-primary');
                document.getElementById('btn_propiedades').classList.add('btn-outline-primary');
                document.getElementById('btn_contratos').classList.remove('btn-secondary');
                document.getElementById('btn_contratos').classList.add('btn-outline-secondary');
                document.getElementById('btn_ventas').classList.remove('btn-secondary');
                document.getElementById('btn_ventas').classList.add('btn-outline-secondary');

                cargarListaClientes();
            ">
            👥 Gestión de Clientes
        </button>

        <button type="button" id="btn_contratos" class="btn btn-outline-secondary"
            onclick="
                document.getElementById('mensaje_inicio_comercial').style.display = 'none';
                document.getElementById('sec_propiedades').style.display = 'none';
                document.getElementById('sec_clientes').style.display = 'none';
                document.getElementById('sec_contratos').style.display = 'block';
                document.getElementById('sec_ventas').style.display = 'none';

                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-secondary');
                document.getElementById('btn_propiedades').classList.remove('btn-primary');
                document.getElementById('btn_propiedades').classList.add('btn-outline-primary');
                document.getElementById('btn_clientes').classList.remove('btn-secondary');
                document.getElementById('btn_clientes').classList.add('btn-outline-secondary');
                document.getElementById('btn_ventas').classList.remove('btn-secondary');
                document.getElementById('btn_ventas').classList.add('btn-outline-secondary');

                cargarListaContratos();
            ">
            📄 Contratos
        </button>

        <button type="button" id="btn_ventas" class="btn btn-outline-secondary"
            onclick="
                document.getElementById('mensaje_inicio_comercial').style.display = 'none';
                document.getElementById('sec_propiedades').style.display = 'none';
                document.getElementById('sec_clientes').style.display = 'none';
                document.getElementById('sec_contratos').style.display = 'none';
                document.getElementById('sec_ventas').style.display = 'block';

                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-secondary');
                document.getElementById('btn_propiedades').classList.remove('btn-primary');
                document.getElementById('btn_propiedades').classList.add('btn-outline-primary');
                document.getElementById('btn_clientes').classList.remove('btn-secondary');
                document.getElementById('btn_clientes').classList.add('btn-outline-secondary');
                document.getElementById('btn_contratos').classList.remove('btn-secondary');
                document.getElementById('btn_contratos').classList.add('btn-outline-secondary');

                cargarResumenVentas();
            ">
            🛒 Registro de Ventas
        </button>
    </div>

    <!-- 📌 ÁREA DE CONTENIDO -->
    <div style="min-height: 500px;">
        <!-- ✅ MENSAJE INICIAL AL ENTRAR -->
        <div id="mensaje_inicio_comercial" class="text-center text-muted py-5 border rounded bg-white">
            <h5>Selecciona una opción del menú superior para comenzar</h5>
            <p class="mt-2">Administra tu inventario de inmuebles, clientes, contratos y operaciones comerciales</p>
        </div>

        <!-- ============================================== -->
        <!-- ✅ SECCIÓN: GESTIÓN DE PROPIEDADES -->
        <!-- ============================================== -->
        <div id="sec_propiedades" style="display: none;">
            <!-- [CONTENIDO ANTERIOR DE PROPIEDADES SIN CAMBIOS] -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 id="tituloFormPropiedad">Nueva Propiedad</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="limpiarFormPropiedad()">+ Nueva</button>
                </div>
                <div class="card-body">
                    <form id="formPropiedad" autocomplete="off" novalidate enctype="multipart/form-data">
                        <input type="hidden" name="id_propiedad" id="id_propiedad" value="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Título / Nombre de la Propiedad *</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="200" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Categoría / Tipo *</label>
                                <select class="form-select" id="id_categoria" name="id_categoria" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Casa</option>
                                    <option value="2">Terreno</option>
                                    <option value="3">Departamento</option>
                                    <option value="4">Local Comercial</option>
                                    <option value="5">Oficina</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tipo de Operación *</label>
                                <select class="form-select" id="tipo_operacion" name="tipo_operacion" required>
                                    <option value="">Seleccione</option>
                                    <option value="Venta">Venta</option>
                                    <option value="Alquiler">Alquiler</option>
                                    <option value="Venta / Alquiler">Ambos</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Precio (Bs.) *</label>
                                <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Estado de la Propiedad *</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="">Seleccione</option>
                                    <option value="Disponible" selected>Disponible</option>
                                    <option value="Reservado">Reservado</option>
                                    <option value="Vendido">Vendido</option>
                                    <option value="Alquilado">Alquilado</option>
                                    <option value="Pendiente">Pendiente Revisión</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Estado Documental *</label>
                                <select class="form-select" id="estado_documental" name="estado_documental" required>
                                    <option value="">Seleccione</option>
                                    <option value="Papeles al día">Papeles al día</option>
                                    <option value="En trámite">En trámite</option>
                                    <option value="Hipotecado / Gravamen">Hipotecado / Con Gravamen</option>
                                    <option value="Regularización">En regularización</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Fecha de Publicación</label>
                                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Dirección Completa *</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" maxlength="255" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ciudad *</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="100" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Zona / Barrio *</label>
                                <input type="text" class="form-control" id="zona" name="zona" maxlength="100" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Coordenadas GPS (Latitud, Longitud)</label>
                                <input type="text" class="form-control" id="gps" name="gps" placeholder="-16.5000, -68.1500">
                                <small class="text-muted">Para mostrar en mapas</small>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Superficie (m²) *</label>
                                <input type="number" class="form-control" id="superficie_m2" name="superficie_m2" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Habitaciones</label>
                                <input type="number" class="form-control" id="habitaciones" name="habitaciones" min="0" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Baños</label>
                                <input type="number" class="form-control" id="banos" name="banos" min="0" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Parqueos</label>
                                <input type="number" class="form-control" id="parqueos" name="parqueos" min="0" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Antigüedad (años)</label>
                                <input type="number" class="form-control" id="antiguedad" name="antiguedad" min="0" value="0">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Visitas Registradas</label>
                                <input type="number" class="form-control bg-light" id="visitas" name="visitas" min="0" value="0" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Descripción Detallada</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="2000"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Galería Fotográfica</label>
                                <input type="file" class="form-control" id="imagenes" name="imagenes[]" multiple accept="image/jpeg, image/png, image/webp">
                                <small class="text-muted">Puede seleccionar varias imágenes. Se guardarán asociadas a la propiedad.</small>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Guardar Propiedad</button>
                            <button type="button" class="btn btn-secondary" onclick="limpiarFormPropiedad()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5>Inventario de Propiedades</h5>
                    <span class="text-muted">Total: <span id="total_propiedades">0</span></span>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Tipo</th>
                                <th>Ubicación</th>
                                <th>Precio (Bs.)</th>
                                <th>Estado</th>
                                <th>Documentos</th>
                                <th>Visitas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPropiedades">
                            <tr><td colspan="9" class="text-center text-muted py-3">Aún no hay propiedades registradas</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- ✅ SECCIÓN: GESTIÓN DE CLIENTES -->
        <!-- ============================================== -->
        <div id="sec_clientes" style="display: none;">
            <!-- [CONTENIDO ANTERIOR DE CLIENTES SIN CAMBIOS] -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <h5 id="tituloFormCliente">Nuevo Cliente / Prospecto</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="limpiarFormCliente()">+ Nuevo Cliente</button>
                </div>
                <div class="card-body">
                    <form id="formCliente" autocomplete="off" novalidate>
                        <input type="hidden" name="cliente_id" id="cliente_id" value="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" maxlength="150" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Cédula de Identidad *</label>
                                <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad" maxlength="20" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="20">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="100" placeholder="correo@ejemplo.com">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Clasificación / Perfil *</label>
                                <select class="form-select" id="estado_cliente" name="estado_cliente" required>
                                    <option value="">Seleccione</option>
                                    <option value="Interesado" selected>Interesado</option>
                                    <option value="Pre-aprobado">Pre-aprobado</option>
                                    <option value="Cliente Activo">Cliente Activo</option>
                                    <option value="Prospecto">Prospecto</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Fecha de Registro</label>
                                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Intereses y Propiedades Visitadas</label>
                                <textarea class="form-control" id="notas" name="notas" rows="4" maxlength="2000" placeholder="Registre aquí qué tipo de inmueble busca, zonas preferidas, propiedades que ha visitado..."></textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-secondary">Guardar Cliente</button>
                            <button type="button" class="btn btn-light border" onclick="limpiarFormCliente()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5>Listado de Clientes y Prospectos</h5>
                    <span class="text-muted">Total: <span id="total_clientes">0</span></span>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Cédula</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Clasificación</th>
                                <th>Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaClientes">
                            <tr><td colspan="8" class="text-center text-muted py-3">Aún no hay clientes registrados</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- ✅ SECCIÓN: CONTRATOS -->
        <!-- ============================================== -->
        <div id="sec_contratos" style="display: none;">
            <!-- [CONTENIDO ANTERIOR DE CONTRATOS SIN CAMBIOS] -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 id="tituloFormContrato">Nuevo Contrato</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="limpiarFormContrato()">+ Nuevo Contrato</button>
                </div>
                <div class="card-body">
                    <form id="formContrato" autocomplete="off" novalidate>
                        <input type="hidden" name="id_contrato" id="id_contrato" value="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Propiedad *</label>
                                <select class="form-select" id="id_propiedad" name="id_propiedad" required>
                                    <option value="">Seleccione una propiedad</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Cliente / Comprador *</label>
                                <select class="form-select" id="id_cliente" name="id_cliente" required>
                                    <option value="">Seleccione un cliente</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Fecha de Firma *</label>
                                <input type="date" class="form-control" id="fecha_firma" name="fecha_firma" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Monto Pactado (Bs.) *</label>
                                <input type="number" class="form-control" id="monto_pactado" name="monto_pactado" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Estado del Contrato *</label>
                                <select class="form-select" id="estado_contrato" name="estado_contrato" required>
                                    <option value="">Seleccione estado</option>
                                    <option value="Borrador" selected>Borrador</option>
                                    <option value="Firmado">Firmado</option>
                                    <option value="Vigente">Vigente</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Anulado">Anulado</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tipo de Contrato</label>
                                <select class="form-select" id="tipo_contrato" name="tipo_contrato">
                                    <option value="Compromiso de Venta" selected>Compromiso de Venta</option>
                                    <option value="Contrato de Alquiler">Contrato de Alquiler</option>
                                    <option value="Contrato de Compraventa">Contrato de Compraventa</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="3" maxlength="3000"></textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-dark">Guardar Contrato</button>
                            <button type="button" class="btn btn-outline-secondary" onclick="generarPDFContrato()">📄 Generar PDF</button>
                            <button type="button" class="btn btn-light border" onclick="limpiarFormContrato()">Limpiar</button>
                        </div>
                        <p class="text-muted small mt-2">(*) Campos obligatorios</p>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5>Listado de Contratos</h5>
                    <span class="text-muted">Total: <span id="total_contratos">0</span></span>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Propiedad</th>
                                <th>Cliente</th>
                                <th>Fecha Firma</th>
                                <th>Monto Pactado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaContratos">
                            <tr><td colspan="7" class="text-center text-muted py-3">Aún no hay contratos registrados</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- ✅ SECCIÓN: REGISTRO DE VENTAS / PAGOS -->
        <!-- ============================================== -->
        <div id="sec_ventas" style="display: none;">

            <!-- 📊 RESUMEN GENERAL -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white shadow-sm">
                        <div class="card-body text-center">
                            <h6>Total Planificado</h6>
                            <h4 id="resumen_total_planificado">Bs. 0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body text-center">
                            <h6>Total Pagado</h6>
                            <h4 id="resumen_total_pagado">Bs. 0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-dark shadow-sm">
                        <div class="card-body text-center">
                            <h6>Saldo Pendiente</h6>
                            <h4 id="resumen_saldo_pendiente">Bs. 0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white shadow-sm">
                        <div class="card-body text-center">
                            <h6>Contratos Activos</h6>
                            <h4 id="resumen_contratos_activos">0</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 📋 LISTADO DE CONTRATOS CON ESTADO DE PAGO -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5>Contratos y Estado de Pagos</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="cargarResumenVentas()">🔄 Actualizar</button>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID Contrato</th>
                                <th>Propiedad</th>
                                <th>Cliente</th>
                                <th>Total Planificado</th>
                                <th>Total Pagado</th>
                                <th>Saldo Pendiente</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaResumenVentas">
                            <tr><td colspan="8" class="text-center text-muted py-3">Seleccione un contrato para ver su plan de pagos</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 📑 GESTIÓN DE PLAN DE PAGOS -->
            <div class="card shadow-sm mb-4" id="panel_plan_pagos" style="display: none;">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <h5 id="tituloPlanPagos">Plan de Pagos</h5>
                    <button type="button" class="btn btn-light btn-sm" onclick="mostrarFormCuota()">+ Agregar Cuota</button>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>N° Cuota</th>
                                <th>Fecha Vencimiento</th>
                                <th>Monto Cuota</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPlanPagos">
                            <tr><td colspan="5" class="text-center text-muted py-2">Sin cuotas registradas</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 💳 REGISTRO DE PAGO -->
            <div class="card shadow-sm" id="panel_registro_pago" style="display: none;">
                <div class="card-header bg-success text-white">
                    <h5>Registrar Pago Realizado</h5>
                </div>
                <div class="card-body">
                    <form id="formPago" autocomplete="off">
                        <input type="hidden" name="id_cronograma" id="id_cronograma" value="">
                        <input type="hidden" name="id_contrato_pago" id="id_contrato_pago" value="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Fecha de Pago *</label>
                                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Monto Pagado (Bs.) *</label>
                                <input type="number" class="form-control" id="monto_pagado" name="monto_pagado" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Método de Pago *</label>
                                <select class="form-select" id="metodo_pago" name="metodo_pago" required>
                                    <option value="">Seleccione</option>
                                    <option value="Transferencia">Transferencia Bancaria</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="QR">Pago QR</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Referencia Bancaria / Comprobante</label>
                                <input type="text" class="form-control" id="referencia_bancaria" name="referencia_bancaria" maxlength="100">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Observaciones</label>
                                <input type="text" class="form-control" id="observaciones_pago" name="observaciones_pago" maxlength="255">
                            </div>
                        </div>
                        <div class="mt-3 d-flex gap-2">
                            <button type="submit" class="btn btn-success">✅ Registrar Pago</button>
                            <button type="button" class="btn btn-secondary" onclick="ocultarFormPago()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 📈 REPORTES BÁSICOS -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-info text-white">
                    <h5>Reportes Financieros</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="generarReporteVentasMes()">📊 Ventas por Mes</button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="generarReportePropiedadesVendidas()">🏠 Propiedades Más Vendidas</button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="generarReporteComisiones()">💸 Comisiones Generadas</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- ✅ FUNCIONES JAVASCRIPT -->
<script type="text/javascript">
"use strict";

// ==============================================
// FUNCIONES PROPIEDADES, CLIENTES, CONTRATOS (SIN CAMBIOS)
// ==============================================
function limpiarFormPropiedad() {
    document.getElementById('id_propiedad').value = '';
    document.getElementById('titulo').value = '';
    document.getElementById('id_categoria').value = '';
    document.getElementById('tipo_operacion').value = '';
    document.getElementById('precio').value = '';
    document.getElementById('estado').value = 'Disponible';
    document.getElementById('estado_documental').value = '';
    document.getElementById('fecha_publicacion').value = '<?= date('Y-m-d') ?>';
    document.getElementById('direccion').value = '';
    document.getElementById('ciudad').value = '';
    document.getElementById('zona').value = '';
    document.getElementById('gps').value = '';
    document.getElementById('superficie_m2').value = '';
    document.getElementById('habitaciones').value = '0';
    document.getElementById('banos').value = '0';
    document.getElementById('parqueos').value = '0';
    document.getElementById('antiguedad').value = '0';
    document.getElementById('visitas').value = '0';
    document.getElementById('descripcion').value = '';
    document.getElementById('tituloFormPropiedad').textContent = 'Nueva Propiedad';
}

document.addEventListener('submit', function(e) {
    if (e.target.id === 'formPropiedad') {
        e.preventDefault();
        const datos = new FormData(e.target);
        fetch('admin.php?modulo=guardar_propiedad', {method:'POST', body:datos, headers:{'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅')){limpiarFormPropiedad();cargarListaPropiedades();}}).catch(e=>{console.error(e);alert('❌ Error al guardar propiedad');});
    }
});

function cargarListaPropiedades() {
    fetch('admin.php?modulo=listar_propiedades', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(h=>{document.getElementById('tablaPropiedades').innerHTML=h;document.getElementById('total_propiedades').textContent=document.querySelectorAll('#tablaPropiedades tr').length-1;}).catch(e=>console.error(e));
}

function editarPropiedad(id) {
    fetch(`admin.php?modulo=obtener_propiedad&id=${id}`, {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.json()).then(d=>{if(d.error){alert('❌ '+d.error);return;}document.getElementById('id_propiedad').value=d.id_propiedad;document.getElementById('titulo').value=d.titulo;document.getElementById('id_categoria').value=d.id_categoria;document.getElementById('tipo_operacion').value=d.tipo_operacion;document.getElementById('precio').value=d.precio;document.getElementById('estado').value=d.estado;document.getElementById('estado_documental').value=d.estado_documental;document.getElementById('fecha_publicacion').value=d.fecha_publicacion?d.fecha_publicacion.split(' ')[0]:'';document.getElementById('direccion').value=d.direccion;document.getElementById('ciudad').value=d.ciudad;document.getElementById('zona').value=d.zona;document.getElementById('gps').value=d.gps||'';document.getElementById('superficie_m2').value=d.superficie_m2;document.getElementById('habitaciones').value=d.habitaciones||0;document.getElementById('banos').value=d.banos||0;document.getElementById('parqueos').value=d.parqueos||0;document.getElementById('antiguedad').value=d.antiguedad||0;document.getElementById('visitas').value=d.visitas||0;document.getElementById('descripcion').value=d.descripcion||'';document.getElementById('tituloFormPropiedad').textContent='Editar Propiedad';}).catch(e=>{console.error(e);alert('❌ No se pudo cargar');});
}

function eliminarPropiedad(id) {
    if(!confirm('¿Eliminar esta propiedad?'))return;
    const d=new FormData();d.append('id_propiedad',id);
    fetch('admin.php?modulo=eliminar_propiedad', {method:'POST',body:d,headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅'))cargarListaPropiedades();}).catch(e=>console.error(e));
}

function limpiarFormCliente() {
    document.getElementById('cliente_id').value = '';
    document.getElementById('nombre_completo').value = '';
    document.getElementById('cedula_identidad').value = '';
    document.getElementById('telefono').value = '';
    document.getElementById('email').value = '';
    document.getElementById('estado_cliente').value = 'Interesado';
    document.getElementById('fecha_registro').value = '<?= date('Y-m-d') ?>';
    document.getElementById('notas').value = '';
    document.getElementById('tituloFormCliente').textContent = 'Nuevo Cliente / Prospecto';
}

document.addEventListener('submit', function(e) {
    if (e.target.id === 'formCliente') {
        e.preventDefault();
        const datos = new FormData(e.target);
        fetch('admin.php?modulo=guardar_cliente', {method:'POST', body:datos, headers:{'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅')){limpiarFormCliente();cargarListaClientes();}}).catch(e=>{console.error(e);alert('❌ Error al guardar cliente');});
    }
});

function cargarListaClientes() {
    fetch('admin.php?modulo=listar_clientes', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(h=>{document.getElementById('tablaClientes').innerHTML=h;document.getElementById('total_clientes').textContent=document.querySelectorAll('#tablaClientes tr').length-1;}).catch(e=>console.error(e));
}

function editarCliente(id) {
    fetch(`admin.php?modulo=obtener_cliente&id=${id}`, {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.json()).then(d=>{if(d.error){alert('❌ '+d.error);return;}document.getElementById('cliente_id').value=d.cliente_id;document.getElementById('nombre_completo').value=d.nombre_completo;document.getElementById('cedula_identidad').value=d.cedula_identidad;document.getElementById('telefono').value=d.telefono||'';document.getElementById('email').value=d.email||'';document.getElementById('estado_cliente').value=d.estado_cliente||'Interesado';document.getElementById('fecha_registro').value=d.fecha_registro?d.fecha_registro.split(' ')[0]:'';document.getElementById('notas').value=d.notas||'';document.getElementById('tituloFormCliente').textContent='Editar Cliente';}).catch(e=>{console.error(e);alert('❌ No se pudo cargar');});
}

function eliminarCliente(id) {
    if(!confirm('¿Eliminar este cliente?'))return;
    const d=new FormData();d.append('cliente_id',id);
    fetch('admin.php?modulo=eliminar_cliente', {method:'POST',body:d,headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅'))cargarListaClientes();}).catch(e=>console.error(e));
}

function limpiarFormContrato() {
    document.getElementById('id_contrato').value = '';
    document.getElementById('id_propiedad').value = '';
    document.getElementById('id_cliente').value = '';
    document.getElementById('fecha_firma').value = '<?= date('Y-m-d') ?>';
    document.getElementById('monto_pactado').value = '';
    document.getElementById('estado_contrato').value = 'Borrador';
    document.getElementById('observaciones').value = '';
    document.getElementById('tituloFormContrato').textContent = 'Nuevo Contrato';
}

document.addEventListener('submit', function(e) {
    if (e.target.id === 'formContrato') {
        e.preventDefault();
        const datos = new FormData(e.target);
        fetch('admin.php?modulo=guardar_contrato', {method:'POST', body:datos, headers:{'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅')){limpiarFormContrato();cargarListaContratos();}}).catch(e=>{console.error(e);alert('❌ Error al guardar contrato');});
    }
});

function cargarListaContratos() {
    fetch('admin.php?modulo=listar_contratos', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(h=>{document.getElementById('tablaContratos').innerHTML=h;document.getElementById('total_contratos').textContent=document.querySelectorAll('#tablaContratos tr').length-1;cargarSelectoresContrato();}).catch(e=>console.error(e));
}

function cargarSelectoresContrato() {
    fetch('admin.php?modulo=listar_propiedades_select', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(h=>{document.getElementById('id_propiedad').innerHTML=h;}).catch(e=>console.error(e));
    fetch('admin.php?modulo=listar_clientes_select', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(h=>{document.getElementById('id_cliente').innerHTML=h;}).catch(e=>console.error(e));
}

function editarContrato(id) {
    fetch(`admin.php?modulo=obtener_contrato&id=${id}`, {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.json()).then(d=>{if(d.error){alert('❌ '+d.error);return;}document.getElementById('id_contrato').value=d.id_contrato;document.getElementById('id_propiedad').value=d.id_propiedad;document.getElementById('id_cliente').value=d.id_cliente;document.getElementById('fecha_firma').value=d.fecha_firma||'';document.getElementById('monto_pactado').value=d.monto_pactado||'';document.getElementById('estado_contrato').value=d.estado_contrato||'Borrador';document.getElementById('observaciones').value=d.observaciones||'';document.getElementById('tituloFormContrato').textContent='Editar Contrato';}).catch(e=>{console.error(e);alert('❌ No se pudo cargar');});
}

function eliminarContrato(id) {
    if(!confirm('¿Eliminar este contrato?'))return;
    const d=new FormData();d.append('id_contrato',id);
    fetch('admin.php?modulo=eliminar_contrato', {method:'POST',body:d,headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text()).then(m=>{alert(m.trim());if(m.includes('✅'))cargarListaContratos();}).catch(e=>console.error(e));
}

function generarPDFContrato() {
    const id = document.getElementById('id_contrato').value;
    if(!id){alert('Guarde el contrato primero');return;}
    window.open(`admin.php?modulo=generar_pdf_contrato&id=${id}`, '_blank');
}

// ==============================================
// ✅ NUEVAS FUNCIONES PARA VENTAS, PLAN DE PAGOS Y PAGOS
// ==============================================
function cargarResumenVentas() {
    fetch('admin.php?modulo=resumen_ventas', {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.json())
    .then(datos=>{
        if(datos.error){alert('❌ '+datos.error);return;}
        // Actualizar tarjetas resumen
        document.getElementById('resumen_total_planificado').textContent = `Bs. ${Number(datos.total_planificado||0).toFixed(2)}`;
        document.getElementById('resumen_total_pagado').textContent = `Bs. ${Number(datos.total_pagado||0).toFixed(2)}`;
        document.getElementById('resumen_saldo_pendiente').textContent = `Bs. ${Number(datos.saldo_pendiente||0).toFixed(2)}`;
        document.getElementById('resumen_contratos_activos').textContent = datos.contratos_activos||0;
        // Actualizar tabla de contratos
        document.getElementById('tablaResumenVentas').innerHTML = datos.tabla_html||'';
    })
    .catch(e=>{console.error(e);alert('❌ No se pudo cargar el resumen');});
}

function verPlanPagos(id_contrato) {
    document.getElementById('id_contrato_pago').value = id_contrato;
    document.getElementById('panel_plan_pagos').style.display = 'block';
    document.getElementById('panel_registro_pago').style.display = 'none';

    fetch(`admin.php?modulo=obtener_plan_pagos&id=${id_contrato}`, {headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text())
    .then(html=>{
        document.getElementById('tablaPlanPagos').innerHTML = html;
        document.getElementById('tituloPlanPagos').textContent = `Plan de Pagos - Contrato #${id_contrato}`;
    })
    .catch(e=>{console.error(e);alert('❌ Error al cargar plan de pagos');});
}

function mostrarFormCuota() {
    const id_contrato = document.getElementById('id_contrato_pago').value;
    if(!id_contrato){alert('Seleccione primero un contrato');return;}
    const fecha = prompt('Fecha de vencimiento (YYYY-MM-DD):');
    const monto = prompt('Monto de la cuota (Bs.):');
    if(!fecha || !monto) return;

    const datos = new FormData();
    datos.append('id_contrato', id_contrato);
    datos.append('fecha_vencimiento', fecha);
    datos.append('monto_cuota', monto);

    fetch('admin.php?modulo=agregar_cuota', {method:'POST', body:datos, headers:{'X-Requested-With':'XMLHttpRequest'}})
    .then(r=>r.text())
    .then(m=>{alert(m.trim());if(m.includes('✅')) verPlanPagos(id_contrato);})
    .catch(e=>{console.error(e);alert('❌ Error al agregar cuota');});
}

function mostrarFormPago(id_cuota, monto_cuota) {
    document.getElementById('id_cronograma').value = id_cuota;
    document.getElementById('monto_pagado').value = monto_cuota;
    document.getElementById('panel_registro_pago').style.display = 'block';
    document.getElementById('fecha_pago').focus();
}

function ocultarFormPago() {
    document.getElementById('id_cronograma').value = '';
    document.getElementById('monto_pagado').value = '';
    document.getElementById('referencia_bancaria').value = '';
    document.getElementById('observaciones_pago').value = '';
    document.getElementById('panel_registro_pago').style.display = 'none';
}

document.addEventListener('submit', function(e) {
    if (e.target.id === 'formPago') {
        e.preventDefault();
        const datos = new FormData(e.target);
        fetch('admin.php?modulo=registrar_pago', {method:'POST', body:datos, headers:{'X-Requested-With':'XMLHttpRequest'}})
        .then(r=>r.text())
        .then(m=>{
            alert(m.trim());
            if(m.includes('✅')){
                const id_contrato = document.getElementById('id_contrato_pago').value;
                ocultarFormPago();
                verPlanPagos(id_contrato);
                cargarResumenVentas();
            }
        })
        .catch(e=>{console.error(e);alert('❌ Error al registrar pago');});
    }
});

function generarReporteVentasMes() {
    window.open('admin.php?modulo=reporte_ventas_mes', '_blank');
}
function generarReportePropiedadesVendidas() {