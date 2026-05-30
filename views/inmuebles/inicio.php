<div class="position-relative overflow-hidden" style="min-height: 580px;">
    
    <div id="heroCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100 z-index-1" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner h-100">
            
            <div class="carousel-item active h-100">
                <div class="hero-bg-img h-100" style="background-image: url('assets/img/slide1.jpg');"></div>
            </div>
            
            <div class="carousel-item h-100">
                <div class="hero-bg-img h-100" style="background-image: url('assets/img/slide2.jpg');"></div>
            </div>
            
            <div class="carousel-item h-100">
                <div class="hero-bg-img h-100" style="background-image: url('assets/img/slide3.jpg');"></div>
            </div>

        </div>
    </div>

    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 z-index-2"></div>
    
    <div class="container position-relative z-index-3 py-5 text-center text-white d-flex flex-column justify-content-center" style="min-height: 580px;">
        
        <h1 class="fs-2 fw-bold mb-3 text-uppercase tracking-wide text-shadow-sc">
            El paso más importante de tu vida merece el mejor lugar, <br>
            <span class="text-warning">Tu nueva propiedad está a un clic de distancia</span>
        </h1>
        <p class="lead fs-4 mb-5 text-light fw-light text-shadow-sc">Encuentra casas, departamentos, terrenos y anticréticos en toda Bolivia</p>

       
       <div class="row justify-content-center"style="margin-top: 90px !important;">
    <div class="col-12 col-xl-9">
        <form action="index.php?ruta=catalogo" method="GET" class="bg-white p-3 rounded shadow-lg row g-2 text-dark align-items-center text-start">
            <input type="hidden" name="ruta" value="catalogo">

            <div class="col-12 col-md-3 text-start border-end-md px-3">
                <label class="form-label small text-secondary fw-bold mb-1">
                    <i class="bi bi-tags-fill text-success me-1"></i> Oferta
                </label>
                <select name="transaccion" class="form-select border-0 ps-0 fw-semibold text-muted shadow-none" required>
                    <option value="venta">En Venta</option>
                    <option value="alquiler">Alquiler</option>
                    <option value="anticretico">Anticrético</option>
                </select>
            </div>

            <div class="col-12 col-md-3 text-start border-end-md px-3">
                <label class="form-label small text-secondary fw-bold mb-1">
                    <i class="bi bi-geo-alt-fill text-success me-1"></i> Ciudad
                </label>
                <select name="ciudad" class="form-select border-0 ps-0 fw-semibold text-muted shadow-none">
                    <option value="el-alto">El Alto</option>
                    <option value="la-paz">La Paz</option>
                    <option value="cochabamba">Cochabamba</option>
                    <option value="santa-cruz">Santa Cruz</option>
                    <option value="oruro">Oruro</option>
                    <option value="tarija">Tarija</option>
                    <option value="trinidad">Trinidad</option>
                    <option value="cobija">Cobija</option>
                    <option value="sucre">Sucre</option>
                    <option value="potosi">Potosi</option>
                    
                </select>
            </div>

            <div class="col-12 col-md-3 text-start border-end-md px-3">
                <label class="form-label small text-secondary fw-bold mb-1">
                    <i class="bi bi-building text-success me-1"></i> Tipo de Propiedad
                </label>
                <select name="tipo" class="form-select border-0 ps-0 fw-semibold text-muted shadow-none">
                    <option value="">Cualquier tipo</option>
                    <option value="terreno">Terrenos</option>
                    <option value="casa">Casas</option>
                    <option value="edificio">Edificios</option>
                    <option value="departamento">Departamentos</option>
                    <option value="garzonier">Garzoniers</option>
                    <option value="monoambiente">Monoambientes</option>
                    <option value="oficina">Oficinas</option>
                    <option value="local comercial">Locales Comerciales</option>
                    <option value="galpon">Galpones / Tinglados</option>
                </select>
            </div>
           
            <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-success w-100 py-2 fw-bold text-uppercase shadow-sm d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-search"></i> <span>Buscar</span>
                </button>
            </div>

        </form>
    </div>
</div>

</div> 

<section class="py-5 bg-light w-100 clearfix">
    <div class="container py-3">
        
        <div class="text-start mb-4">
            <h2 class="fw-bold text-uppercase m-0" style="color: #0d47a1;">
                Las Propiedades <span class="text-success">Más Vistas</span>
            </h2>
            <p class="text-muted small mb-0">Mostramos una galería de nuestras mejores ofertas de inmuebles en el mercado.</p>
            <hr class="border-success opacity-75 mt-2" style="width: 80px; height: 3px;">
        </div>

        <div class="row g-4">
            
            <div class="col-12 col-md-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3">
                    <div class="position-relative w-100" style="height: 220px;">
                        <img src="assets/img/Casa.jpg" class="card-img-top w-100 h-100" alt="Casa en Venta" style="object-fit: cover; object-position: center;">
                        <span class="position-absolute top-0 start-0 bg-success text-white px-3 py-1 small fw-bold m-2 rounded-2">En Venta</span>
                    </div>
                    <div class="bg-success text-white d-flex justify-content-around py-2 small fw-semibold">
                        <span><i class="bi bi-r-square me-1"></i> 250 m²</span>
                        <span><i class="bi bi-door-open me-1"></i> 4 Hab</span>
                        <span><i class="bi bi-droplet me-1"></i> 3 Baños</span>
                    </div>
                    <div class="card-body text-start p-3">
                        <h5 class="fw-bold text-dark text-truncate mb-1">Hermosa Casa Residencial</h5>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-success me-1"></i> La Paz, Bolivia</p>
                        <h4 class="fw-extrabold text-success m-0">$us 145,000</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 p-3 pt-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3">
                    <div class="position-relative w-100" style="height: 220px;">
                        <img src="assets/img/Departamento.jpg" class="card-img-top w-100 h-100" alt="Departamento en Alquiler" style="object-fit: cover; object-position: center;">
                        <span class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 small fw-bold m-2 rounded-2">Alquiler</span>
                    </div>
                    <div class="bg-success text-white d-flex justify-content-around py-2 small fw-semibold">
                        <span><i class="bi bi-r-square me-1"></i> 95 m²</span>
                        <span><i class="bi bi-door-open me-1"></i> 2 Hab</span>
                        <span><i class="bi bi-droplet me-1"></i> 2 Baños</span>
                    </div>
                    <div class="card-body text-start p-3">
                        <h5 class="fw-bold text-dark text-truncate mb-1">Departamento Moderno y Céntrico</h5>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-success me-1"></i> El Alto, Bolivia</p>
                        <h4 class="fw-extrabold text-success m-0">$us 350 <span class="small text-muted fw-normal">/mes</span></h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 p-3 pt-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3">
                    <div class="position-relative w-100" style="height: 220px;">
                        <img src="assets/img/Terrenos.jpg" class="card-img-top w-100 h-100" alt="Terreno en Bolivia" style="object-fit: cover; object-position: center;">
                        <span class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 small fw-bold m-2 rounded-2">Anticrético</span>
                    </div>
                    <div class="bg-success text-white d-flex justify-content-around py-2 small fw-semibold">
                        <span><i class="bi bi-r-square me-1"></i> 400 m²</span>
                        <span><i class="bi bi-shield-check me-1"></i> Papeles al día</span>
                    </div>
                    <div class="card-body text-start p-3">
                        <h5 class="fw-bold text-dark text-truncate mb-1">Terreno Amplio ideal para Construcción</h5>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-success me-1"></i> Santa Cruz, Bolivia</p>
                        <h4 class="fw-extrabold text-success m-0">$us 45,000</h4>
                    </div>
                    <div class="card-footer bg-white border-top-0 p-3 pt-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3">Ver Detalles</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5 bg-white w-100 clearfix">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <div class="col-12 col-sm-4 text-center">
                <a href="index.php?ruta=catalogo&tipo=terreno" class="text-decoration-none group-cat">
                    <h4 class="fw-bold text-success mb-2 text-uppercase tracking-wide">Terrenos</h4>
                    <div class="overflow-hidden rounded-3 shadow-sm position-relative img-hover-container" style="height: 180px;">
                        <img src="assets/img/Cat-Terrenos.jpg" class="img-fluid w-100 h-100 transition-transform" style="object-fit: cover; object-position: center;" alt="Terrenos">
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-4 text-center">
                <a href="index.php?ruta=catalogo&tipo=casa" class="text-decoration-none group-cat">
                    <h4 class="fw-bold text-success mb-2 text-uppercase tracking-wide">Casas</h4>
                    <div class="overflow-hidden rounded-3 shadow-sm position-relative img-hover-container" style="height: 180px;">
                        <img src="assets/img/Cat-casas.jpg" class="img-fluid w-100 h-100 transition-transform" style="object-fit: cover; object-position: center;" alt="Casas">
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-4 text-center">
                <a href="index.php?ruta=catalogo&tipo=departamento" class="text-decoration-none group-cat">
                    <h4 class="fw-bold text-success mb-2 text-uppercase tracking-wide">Departamentos</h4>
                    <div class="overflow-hidden rounded-3 shadow-sm position-relative img-hover-container" style="height: 180px;">
                        <img src="assets/img/Cat-departamentos.jpg" class="img-fluid w-100 h-100 transition-transform" style="object-fit: cover; object-position: center;" alt="Departamentos">
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<div class="container"> 

<style>
/* Forzar reajuste absoluto de imágenes */
.card-img-top, .img-hover-container img {
    width: 100% !important;
    height: 100% !important;
}
.transition-transform {
    transition: transform 0.4s ease;
}
.group-cat:hover .transition-transform {
    transform: scale(1.05);
}
.img-hover-container {
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}
.group-cat:hover .img-hover-container {
    border-color: #198754;
}
</style>

</div>
</div>
<?php
    include "views/modulos/footer.php";
?>