<footer class="text-light pt-5 pb-3 w-100 clearfix border-top border-4" style="background-color: #0d47a1 !important; border-color: #198754 !important;">
    <div class="container">
        <div class="row g-4 text-start">
            
            <div class="col-12 col-md-4">
                <h5 class="text-uppercase fw-bold mb-3" style="color: #28a745 !important;">Super Casas S.R.L.</h5>
                <p class="small text-white-50 mb-2">
                    <i class="bi bi-geo-alt-fill me-2" style="color: #28a745 !important;"></i> Calle San Martin # 1844 Zona Rio Seco
                </p>
                <p class="small text-white-50 mb-2">
                    <i class="bi bi-envelope-fill me-2" style="color: #28a745 !important;"></i> contacto@supercasas.com.bo
                </p>
                <p class="small text-white-50">
                    <i class="bi bi-telephone-fill me-2" style="color: #28a745 !important;"></i> (+591) 2 423034 - 77242025
                </p>
            </div>

            <div class="col-12 col-md-4 text-md-center">
                <h5 class="text-uppercase fw-bold text-white mb-3">Navegación</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="index.php?ruta=inicio" class="text-white-50 text-decoration-none footer-link">Inicio</a></li>
                    <li class="mb-2"><a href="index.php?ruta=nosotros" class="text-white-50 text-decoration-none footer-link">¿Quiénes Somos?</a></li>
                    <li class="mb-2"><a href="index.php?ruta=catalogo" class="text-white-50 text-decoration-none footer-link">Inmuebles</a></li>
                    <li><a href="index.php?ruta=contacto" class="text-white-50 text-decoration-none footer-link">Contactos</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 text-md-end">
                <h5 class="text-uppercase fw-bold text-white mb-3">Síguenos</h5>
                <div class="d-flex gap-3 justify-content-md-end justify-content-start">
                    <a href="#" class="btn btn-outline-light rounded-circle btn-social d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light rounded-circle btn-social d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light rounded-circle btn-social d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="bg-light opacity-25 my-4">

        <div class="row">
            <div class="col-12 text-center">
                <p class="small text-white-50 mb-0">&copy; <?php echo date('Y'); ?> Super Casas. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>

<style>
/* Interactividad: Los enlaces se iluminan en Verde Institucional al pasar el mouse */
.footer-link {
    transition: color 0.2s ease;
}
.footer-link:hover {
    color: #28a745 !important;
    text-decoration: underline !important;
}

/* Redes sociales: El botón se vuelve completamente verde en Hover */
.btn-social {
    transition: all 0.3s ease;
    border-color: rgba(255, 255, 255, 0.5) !important;
}
.btn-social:hover {
    background-color: #198754 !important;
    border-color: #198754 !important;
    color: #fff !important;
    transform: translateY(-3px);
}
</style>

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