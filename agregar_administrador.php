<?php
// Incluir el archivo de conexión a la base de datos
include 'funciones.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $codigo = $_POST['codigo'];
    $rol = $_POST['rol'];

    // Conectar a la base de datos
    $conn = conectarBD();

    // Preparar la consulta SQL para insertar los datos en la tabla de administradores
    $sql = "INSERT INTO administradores (nombre, apellidos, dni, codigo, rol) VALUES ('$nombre', '$apellidos', '$dni', '$codigo', '$rol')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: administrador.php");
        exit;
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    $conn->close();
    
}
?>
