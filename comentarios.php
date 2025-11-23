<?php
include 'config/database.php';

// Procesar formulario de nuevo comentario
if ($_POST && isset($_POST['accion']) && $_POST['accion'] == 'crear') {
    $nombreyapellido = $_POST['nombreyapellido'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $nota = $_POST['nota'];
    $fechanota = date('d/m/Y H:i:s');
    
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "INSERT INTO comentarios (nombreyapellido, usuario, email, nota, fechanota) 
              VALUES (:nombreyapellido, :usuario, :email, :nota, :fechanota)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombreyapellido', $nombreyapellido);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nota', $nota);
    $stmt->bindParam(':fechanota', $fechanota);
    
    if ($stmt->execute()) {
        header("Location: comentarios.php?success=1");
        exit();
    }
}

// Procesar edición de comentario
if ($_POST && isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $id = $_POST['id'];
    $nota = $_POST['nota'];
    
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "UPDATE comentarios SET nota = :nota WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nota', $nota);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: comentarios.php?success=2");
        exit();
    }
}

// Procesar eliminación de comentario
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "DELETE FROM comentarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: comentarios.php?success=3");
        exit();
    }
}

// Obtener todos los comentarios
$database = new Database();
$db = $database->getConnection();
$query = "SELECT * FROM comentarios ORDER BY id DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas - Comentarios</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <style>
        .comentarios-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .form-comentario {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input, 
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn:hover {
            background: #45a049;
        }
        
        .comentario {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        
        .comentario-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .comentario-info h4 {
            margin: 0;
            color: #333;
        }
        
        .comentario-info .email {
            color: #666;
            font-size: 14px;
        }
        
        .comentario-fecha {
            color: #999;
            font-size: 12px;
        }
        
        .comentario-texto {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        
        .comentario-acciones {
            display: flex;
            gap: 10px;
        }
        
        .btn-editar, .btn-eliminar {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }
        
        .btn-editar {
            background: #2196F3;
            color: white;
        }
        
        .btn-eliminar {
            background: #f44336;
            color: white;
        }
        
        .form-editar {
            display: none;
            margin-top: 10px;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="fototeca.php">Fototeca</a></li>
                <li><a href="comentarios.php">Comentarios</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Comentarios y Notas</h1>
            <p>Comparte tus pensamientos sobre nuestro sitio de gatitos</p>
        </section>

        <div class="comentarios-container">
            <?php if (isset($_GET['success'])): ?>
                <div class="success-message">
                    <?php 
                    switch($_GET['success']) {
                        case 1: echo "¡Comentario agregado exitosamente!"; break;
                        case 2: echo "¡Comentario editado exitosamente!"; break;
                        case 3: echo "¡Comentario eliminado exitosamente!"; break;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <!-- Formulario para nuevo comentario -->
            <form method="POST" class="form-comentario">
                <input type="hidden" name="accion" value="crear">
                
                <div class="form-group">
                    <label for="nombreyapellido">Nombre y Apellido *</label>
                    <input type="text" id="nombreyapellido" name="nombreyapellido" required>
                </div>
                
                <div class="form-group">
                    <label for="usuario">Nombre de Usuario (opcional)</label>
                    <input type="text" id="usuario" name="usuario">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="nota">Tu Comentario *</label>
                    <textarea id="nota" name="nota" rows="4" required maxlength="1000" placeholder="Escribe tu comentario aquí... (máximo 1000 caracteres)"></textarea>
                </div>
                
                <button type="submit" class="btn">Enviar Comentario</button>
            </form>

            <!-- Lista de comentarios existentes -->
            <h2>Comentarios Existentes (<?php echo count($comentarios); ?>)</h2>
            
            <?php if (count($comentarios) > 0): ?>
                <?php foreach($comentarios as $comentario): ?>
                <div class="comentario" id="comentario-<?php echo $comentario['id']; ?>">
                    <div class="comentario-header">
                        <div class="comentario-info">
                            <h4><?php echo htmlspecialchars($comentario['nombreyapellido']); ?>
                                <?php if (!empty($comentario['usuario'])): ?>
                                    <small>(@<?php echo htmlspecialchars($comentario['usuario']); ?>)</small>
                                <?php endif; ?>
                            </h4>
                            <div class="email"><?php echo htmlspecialchars($comentario['email']); ?></div>
                        </div>
                        <div class="comentario-fecha"><?php echo htmlspecialchars($comentario['fechanota']); ?></div>
                    </div>
                    
                    <div class="comentario-texto"><?php echo nl2br(htmlspecialchars($comentario['nota'])); ?></div>
                    
                    <div class="comentario-acciones">
                        <button class="btn-editar" onclick="mostrarEditar(<?php echo $comentario['id']; ?>)">Editar</button>
                        <button class="btn-eliminar" onclick="eliminarComentario(<?php echo $comentario['id']; ?>)">Eliminar</button>
                    </div>
                    
                    <!-- Formulario de edición (oculto por defecto) -->
                    <form method="POST" class="form-editar" id="form-editar-<?php echo $comentario['id']; ?>">
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
                        <div class="form-group">
                            <textarea name="nota" rows="3" required><?php echo htmlspecialchars($comentario['nota']); ?></textarea>
                        </div>
                        <button type="submit" class="btn">Guardar Cambios</button>
                        <button type="button" class="btn" onclick="ocultarEditar(<?php echo $comentario['id']; ?>)">Cancelar</button>
                    </form>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #666; padding: 40px;">
                    No hay comentarios aún. ¡Sé el primero en comentar!
                </p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Patitas. Todos los derechos reservados.</p>
    </footer>

    <script>
        function mostrarEditar(id) {
            document.getElementById('form-editar-' + id).style.display = 'block';
        }
        
        function ocultarEditar(id) {
            document.getElementById('form-editar-' + id).style.display = 'none';
        }
        
        function eliminarComentario(id) {
            if (confirm('¿Estás seguro de que quieres eliminar este comentario?')) {
                window.location.href = 'comentarios.php?eliminar=' + id;
            }
        }
    </script>
</body>
</html>