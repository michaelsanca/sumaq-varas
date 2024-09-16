<?php 
include 'funciones.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $profesor = $_POST['profesor'];
    $conn = conectarBD();
    $sql = "INSERT INTO cursos (nombre, descripcion, profesor) VALUES ('$nombre', '$descripcion', '$profesor')";
    if ($conn->query($sql) === TRUE) {
        header("Location: cursos.php");
        exit;
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    $conn->close();   
}
?>
