<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas - Fototeca</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="fototeca.php">Fototeca</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="comentarios.php">Comentarios</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="gallery-hero">
            <h1>Fototeca de Gatitos</h1>
            <p>Descubre nuestra colección de imágenes y videos adorables</p>
        </section>

        <section class="filters">
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="fotos">Fotos</button>
            <button class="filter-btn" data-filter="videos">Videos</button>
        </section>

        <section class="gallery">
            <div class="gallery-grid">
                <!-- Fotos -->
                <div class="gallery-item fotos">
                    <img src="assets/gatito1.jpg" alt="Gatito juguetón">
                    <div class="overlay">
                        <h3>Gatito Curioso</h3>
                        <p>Explorando el mundo</p>
                    </div>
                </div>

                <div class="gallery-item fotos">
                    <img src="assets/gatito2.jpeg" alt="Gatito tierno"  >
                    <div class="overlay">
                        <h3>Gatito Juguetón</h3>
                        <p>profe póngame 20</p>
                    </div>
                </div>

                <div class="gallery-item fotos">
                    <img src="assets/gatito3.jpeg" alt="Gatito elegante">
                    <div class="overlay">
                        <h3>más gatitos</h3>
                        <p>se ven frescos</p>
                    </div>
                </div>

                <!-- Videos (puedes agregar videos reales después) -->
                <div class="gallery-item videos">
                    <div class="video-placeholder">
                        <span>🎥</span>
                        <p>Video de gatitos jugando</p>
                    </div>
                    <div class="overlay">
                        <h3>Gatitos Jugando</h3>
                        <p>Momentos divertidos</p>
                    </div>
                </div>

                <div class="gallery-item videos">
                    <div class="video-placeholder">
                        <span>🎥</span>
                        <p>Video de gatito comiendo</p>
                    </div>
                    <div class="overlay">
                        <h3>Hora de Comer</h3>
                        <p>¡Delicioso!</p>
                    </div>
                </div>

                <div class="gallery-item fotos">
                    <img src="assets/gatito4.jpeg" alt="Gatito adicional (triste)">
                    <div class="overlay">
                        <h3>gatito truste</h3>
                        <p>q le habrá pasao</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Patitas. Todos los derechos reservados.</p>
    </footer>

    <script src="filtrogaleria.js"></script>
</body>
</html>