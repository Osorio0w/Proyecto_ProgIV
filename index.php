<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas - Inicio</title>
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
        <section class="hero">
            <h1>Bienvenido a Patitas</h1>
            <p>El paraíso para los amantes de los gatitos</p>
            <a href="fototeca.php" class="cta-button">Ver Galería</a>
        </section>

        <section class="about">
            <h2>Sobre Nosotros</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>En Patitas nos dedicamos a compartir la belleza y ternura de los gatos. Nuestra misión es crear una comunidad donde los amantes de los felinos puedan disfrutar de contenido adorable y educativo.</p>
                    <p>Explora nuestra fototeca llena de imágenes y videos que te derretirán el corazón.</p>
                </div>
                <div class="about-image">
                    <img src="assets/gatito1.jpg" alt="Gatito adorable">
                </div>
            </div>
        </section>

        <section class="features">
            <h2>¿Qué encontrarás aquí?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>📸 Fototeca</h3>
                    <p>Galería con las fotos más adorables de gatitos</p>
                </div>
                <div class="feature-card">
                    <h3>🎥 Videos</h3>
                    <p>Momentos divertidos y tiernos en video</p>
                </div>
                <div class="feature-card">
                    <h3>💕 Comunidad</h3>
                    <p>Conecta con otros amantes de los gatos</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Patitas. Todos los derechos reservados.</p>
        <p>Hecho con 💖 para los amantes de los gatos</p>
    </footer>
</body>

<?php
// 1. Incluir el archivo de conexión
include 'db_connection.php'; // Ajusta la ruta si es necesario

// 2. Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_nota'])) {
    
    // 3. Obtener los datos del formulario
    $nombreyapellido = trim($_POST['nombreyapellido']);
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $nota = trim($_POST['nota']);
    
    // 4. Generar la fecha actual (como requiere el proyecto)
    // Usamos el formato "d/m/Y H:i:s" para guardarlo en el VARCHAR
    $fechanota = date("d/m/Y H:i:s"); 

    // 5. Preparar la consulta SQL (IMPORTANTE: Sentencias preparadas para seguridad)
    $sql = "INSERT INTO comentarios (nombreyapellido, usuario, email, nota, fechanota) VALUES (?, ?, ?, ?, ?)";
    
    // Crear una sentencia preparada
    $stmt = $conn->prepare($sql);
    
    // 6. Vincular los parámetros (s = string, i = integer, etc.)
    // 'sssss' indica que todos los 5 parámetros son strings
    $stmt->bind_param("sssss", $nombreyapellido, $usuario, $email, $nota, $fechanota);
    
    // 7. Ejecutar la sentencia
    if ($stmt->execute()) {
        // Redirigir para evitar reenvío del formulario (Good Practice)
        header("Location: comentarios.php?status=success");
        exit();
    } else {
        echo "Error al agregar la nota: " . $stmt->error;
    }

    // 8. Cerrar la sentencia
    $stmt->close();
}

// NOTA: La conexión ($conn) se cierra al final del script automáticamente, 
// pero se puede cerrar manualmente si es necesario.
?>

</html>