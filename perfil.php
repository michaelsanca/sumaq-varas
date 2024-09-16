<?php
session_start();

// Verificar si hay una sesión iniciada y las variables de sesión están definidas
if(isset($_SESSION['usuario_nombre']) && isset($_SESSION['usuario_apellidos']) && isset($_SESSION['usuario_rol'])) {
    $nombre = $_SESSION['usuario_nombre'];
    $apellidos = $_SESSION['usuario_apellidos'];
    $rol = $_SESSION['usuario_rol'];
} else {
    // Si no hay datos de usuario en la sesión, redirige al usuario a iniciar sesión
    header("Location: login.php");
    exit();
}
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Perfil</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="content">
    <h2>Perfil</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Datos del Usuario</h5>
            <p class="card-text"><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p class="card-text"><strong>Apellidos:</strong> <?php echo $apellidos; ?></p>
            <p class="card-text"><strong>Rol:</strong> <?php echo $rol; ?></p>

            <hr>
            <h5 class="card-title">Fecha y Hora Actual</h5>
            <p class="card-text"><strong>Fecha:</strong> <span id="fecha"></span></p>
            <p class="card-text"><strong>Hora:</strong> <span id="hora"></span></p>
            <hr>
            <h5 class="card-title">Version del software</h5>
            <p class="card-text"><strong>Version beta del programa 2024</strong> </span></p>
        </div>
    </div>
</div>
<script>
    function actualizarFechaHora() {
        const ahora = new Date();
        const opcionesFecha = { year: 'numeric', month: 'long', day: 'numeric' };
        const opcionesHora = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        document.getElementById('fecha').textContent = ahora.toLocaleDateString('es-ES', opcionesFecha);
        document.getElementById('hora').textContent = ahora.toLocaleTimeString('es-ES', opcionesHora);
    }
    actualizarFechaHora();
    setInterval(actualizarFechaHora, 1000); // Actualizar cada segundo
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>
</html>
