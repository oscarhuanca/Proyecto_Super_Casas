<?php
if (!defined('ENTRADA_PERMITIDA')) define('ENTRADA_PERMITIDA', true);
global $conexion;
?>

<style>
/* Estilos idénticos a tu panel SuperCasas */
.panel-header {
    background-color: #003380;
    color: white;
    padding: 12px 20px;
    border-radius: 4px 4px 0 0;
    font-size: 18px;
    font-weight: 500;
    margin: 0;
}
.panel-body {
    border: 1px solid #e5e7eb;
    border-top: none;
    padding: 18px 20px;
    background: #ffffff;
}
.descripcion {
    color: #6b7280;
    font-size: 14px;
    margin-bottom: 20px;
}
.btn-reporte {
    padding: 6px 14px;
    border-radius: 4px;
    border: 1px solid;
    background: #fff;
    font-size: 14px;
    margin-right: 10px;
    margin-bottom: 10px;
    cursor: pointer;
}
.btn-ventas { border-color: #0066cc; color: #003380; }
.btn-propiedades { border-color: #2da44e; color: #1a6937; }
.btn-usuarios { border-color: #8250df; color: #532f91; }
.btn-actividad { border-color: #f08824; color: #9a5300; }
.btn-ventas:hover { background: #e6f0ff; }
.btn-propiedades:hover { background: #e6f9ed; }
.btn-usuarios:hover { background: #f5f0ff; }
.btn-actividad:hover { background: #fff5e6; }
.btn-imprimir {
    border: 1px solid #6c757d;
    background: #fff;
    color: #495057;
    padding: 6px 14px;
    border-radius: 4px;
    float: right;
}
.mensaje-inicial {
    padding: 60px 20px;
    text-align: center;
    color: #6b7280;
}
.mensaje-inicial h5 {
    font-size: 18px;
    margin: 0 0 8px 0;
}
.mensaje-inicial p {
    font-size: 14px;
    margin: 0;
}
.mensaje-vacio {
    padding: 50px 20px;
    text-align: center;
    color: #dc3545;
    background: #fff8f8;
    border-radius: 4px;
    border: 1px solid #ffe6e6;
}
.clearfix { clear: both; margin-bottom: 20px; }
</style>

<div class="container-fluid mt-4">

    <!-- Encabezado igual a tu captura -->
    <div class="panel-header">
        Reportes del Sistema
    </div>

    <div class="panel-body">
        <p class="descripcion">Visualiza y descarga reportes de actividad, ventas y propiedades.</p>

        <!-- Botones de menú + Botón Imprimir -->
        <div class="clearfix">
            <button type="button" class="btn-reporte btn-ventas" onclick="cargarReporte('ventas')">📊 Reporte de Ventas</button>
            <button type="button" class="btn-reporte btn-propiedades" onclick="cargarReporte('propiedades')">🏡 Reporte de Propiedades</button>
            <button type="button" class="btn-reporte btn-usuarios" onclick="cargarReporte('usuarios')">👤 Reporte de Usuarios</button>
            <button type="button" class="btn-reporte btn-actividad" onclick="cargarReporte('actividad')">📋 Actividad del Sistema</button>

            <button type="button" class="btn-imprimir" onclick="imprimirReporte()">🖨️ Imprimir Reporte</button>
        </div>

        <!-- Área de contenido -->
        <div id="contenido_reporte" style="min-height: 250px; border: 1px solid #e5e7eb; border-radius: 4px; padding: 15px;">
            <!-- Mensaje inicial igual a tu imagen -->
            <div class="mensaje-inicial">
                <h5>Selecciona una opción del menú superior</h5>
                <p>Verás resúmenes, gráficos comparativos y listados detallados</p>
            </div>
        </div>
    </div>

</div>

<!-- Librería para gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>

<script>
function cargarReporte(tipo) {
    const contenedor = document.getElementById('contenido_reporte');

    // Mostrar carga
    contenedor.innerHTML = `
        <div style="text-align:center; padding:50px;">
            <div class="spinner-border text-primary"></div>
            <p style="margin-top:10px;">Cargando datos...</p>
        </div>`;

    // Llamar a la función en admin.php
    fetch('admin.php?modulo=obtener_reporte&tipo=' + tipo, {
        method: 'GET',
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.json())
    .then(datos => {
        // Si no hay datos
        if (datos.vacio === true) {
            contenedor.innerHTML = `
                <div class="mensaje-vacio">
                    <h5>${datos.mensaje || 'No hay información registrada'}</h5>
                    <p>Registra datos en el sistema para poder generar este reporte.</p>
                </div>`;
            return;
        }

        // Si hay error
        if (datos.error) {
            contenedor.innerHTML = `
                <div style="padding:20px; background:#f8d7da; border:1px solid #f5c6cb; color:#721c24; border-radius:4px;">
                    ❌ ${datos.error}
                </div>`;
            return;
        }

        // Si hay datos: armar reporte completo
        let html = `<h4>${datos.titulo}</h4>`;

        // Tarjetas resumen
        html += `<div class="row mb-4">`;
        datos.tarjetas.forEach(t => {
            html += `<div class="col-md-3"><div class="card bg-${t.color} text-white p-3 text-center"><h6>${t.etiqueta}</h6><h4>${t.valor}</h4></div></div>`;
        });
        html += `</div>`;

        // Gráficos
        html += `<div class="row mb-4">
            <div class="col-md-6"><h5 class="text-center">${datos.grafico_barras.titulo}</h5><canvas id="grafico_barras" height="220"></canvas></div>
            <div class="col-md-6"><h5 class="text-center">${datos.grafico_torta.titulo}</h5><canvas id="grafico_torta" height="220"></canvas></div>
        </div>`;

        // Tabla
        html += `<h5>Detalle de registros</h5><div class="table-responsive"><table class="table table-striped table-bordered">
            <thead><tr>`;
        datos.columnas.forEach(c => html += `<th>${c}</th>`);
        html += `</tr></thead><tbody>`;
        if (datos.filas.length > 0) {
            datos.filas.forEach(fila => {
                html += `<tr>`;
                fila.forEach(celda => html += `<td>${celda}</td>`);
                html += `</tr>`;
            });
        } else {
            html += `<tr><td colspan="${datos.columnas.length}" class="text-center text-muted">Sin registros</td></tr>`;
        }
        html += `</tbody></table></div>`;

        contenedor.innerHTML = html;

        // Dibujar gráficos
        new Chart(document.getElementById('grafico_barras'), {
            type: 'bar',
            data: {
                labels: datos.grafico_barras.etiquetas,
                datasets: [{ label: datos.grafico_barras.etiqueta_serie, data: datos.grafico_barras.valores, backgroundColor: '#0066cc' }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });

        new Chart(document.getElementById('grafico_torta'), {
            type: 'pie',
            data: {
                labels: datos.grafico_torta.etiquetas,
                datasets: [{ data: datos.grafico_torta.valores, backgroundColor: ['#0066cc','#2da44e','#8250df','#f08824','#e63946'] }]
            }
        });
    })
    .catch(err => {
        contenedor.innerHTML = `
            <div style="padding:20px; background:#f8d7da; border:1px solid #f5c6cb; color:#721c24; border-radius:4px;">
                ❌ No se pudo conectar para cargar el reporte. Verifica la conexión.
            </div>`;
        console.error(err);
    });
}

function imprimirReporte() {
    const contenido = document.getElementById('contenido_reporte').innerHTML;
    const ventana = window.open('', '_blank', 'width=900,height=700');
    ventana.document.write(`
        <html>
        <head>
            <title>SuperCasas - Reporte</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <style>body{padding:20px; font-size:13px;} h3{color:#003380; border-bottom:2px solid #003380; padding-bottom:10px;}</style>
        </head>
        <body onload="window.print(); setTimeout(() => window.close(), 500);">
            <h3>SuperCasas - Reporte del Sistema</h3>
            ${contenido}
        </body>
        </html>
    `);
    ventana.document.close();
}
</script>