<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas - Contacto</title>
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
        <section class="contact-hero">
            <h1>Contacto</h1>
            <p>Si tienes fotos de tus gatitos o quieres decir hola</p>
        </section>

        <section class="contact-content">
            <!-- Formulario que hice -->
            <div class="contact-form">
                <h2>Mándanos un mensaje</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="nombre">Tu nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="asunto">Asunto:</label>
                        <select id="asunto" name="asunto">
                            <option value="fotos">Quiero compartir fotos</option>
                            <option value="pregunta">Tengo una pregunta</option>
                            <option value="sugerencia">Sugerencia</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="6" placeholder="Escribe tu mensaje aquí..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="newsletter" checked>
                            Quiero recibir fotos de gatitos por email
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-btn">Enviar Mensaje</button>
                </form>
            </div>

            <!-- Información de contacto -->
            <div class="contact-info">
                <h2>Dónde encontrarnos</h2>
                
                <div class="info-item">
                    <h3>📧 Email</h3>
                    <p>patitas@gatitos.com</p>
                </div>
                
                <div class="info-item">
                    <h3>📱 Redes Sociales</h3>
                    <p>Instagram: @patitas_gatitos</p>
                    <p>Facebook: Patitas Oficial</p>
                </div>
                
                <div class="info-item">
                    <h3>🏠 Dirección</h3>
                    <p>Calle de los Ronroneos 123</p>
                    <p>Ciudad Gatuna, CP 28000</p>
                </div>
                
                <div class="info-item">
                    <h3>📞 Teléfono</h3>
                    <p>+34 91 234 56 78</p>
                    <p><small>(Atendemos de 10:00 a 18:00)</small></p>
                </div>

                <!-- Mapa placeholder -->
                <div class="map-placeholder">
                    <h3>🗺️ Nuestra ubicación</h3>
                    <div class="mapa">
                        <p>[no sé como poner un mapa]</p>
                        <p>🌍 Calle silksong 123</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección extra que se me ocurrió -->
        <section class="faq">
            <h2>Preguntas Frecuentes</h2>
            <div class="faq-item">
                <h3>¿Puedo enviar fotos de mi gato?</h3>
                <p>¡Claro! Nos encanta recibir fotos de gatitos. Usa el formulario y adjunta las fotos.</p>
            </div>
            <div class="faq-item">
                <h3>¿Hacen encuentros de gatitos?</h3>
                <p>Por ahora no, pero estamos pensando en organizar alguno pronto.</p>
            </div>
            <div class="faq-item">
                <h3>¿Dan consejos sobre cuidados?</h3>
                <p>Sí, puedes preguntarnos cualquier duda sobre el cuidado de tu gato.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Patitas - Página hecha con mucho esfuerzo</p>
        <p>Hecho con 💖 para los amantes de los gatos</p>
    </footer>

    <script>
        // JavaScript simple para el formulario
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('¡Mensaje enviado! Gracias por contactarnos 😺');
            this.reset();
        });
    </script>
</body>
</html>