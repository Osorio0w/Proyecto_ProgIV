<?php
// 🔑 PARÁMETROS DE CONEXIÓN (Ajusta estos valores)
$servername = "localhost"; // Generalmente es 'localhost' si usas XAMPP/WAMP
$username = "root";        // Usuario de tu servidor MySQL (típicamente 'root' en local)
$password = "";            // Contraseña de tu servidor MySQL (vacía '' si usas XAMPP/WAMP por defecto)
$dbname = "portafolio_db"; // Nombre de la base de datos que crearás

// Crear conexión usando MySQLi (Orientado a objetos)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    // Si la conexión falla, detiene la ejecución y muestra el error
    die("Conexión fallida: " . $conn->connect_error);
}

// Opcional, pero buena práctica: Asegurar la codificación de caracteres
$conn->set_charset("utf8");

// Nota: Puedes agregar un 'echo "Conectado correctamente";' para probar
// y luego borrarlo.
?>