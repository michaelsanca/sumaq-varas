<?php
// Incluir el archivo de conexión a la base de datos
include 'funciones.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];

    // Conectar a la base de datos
    $conn = conectarBD();

    // Preparar la consulta SQL para insertar los datos en la tabla 'solicitud'
    $sql = "INSERT INTO solicitud (nombre, apellido, telefono, dni) VALUES ('$nombre', '$apellido', '$telefono', '$dni')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redireccionar a index.html si la inserción fue exitosa
        header("Location: index.html");
        exit; // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>
