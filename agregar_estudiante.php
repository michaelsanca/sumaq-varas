<?php 
include 'funciones.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $codigo = $_POST['codigo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $conn = conectarBD();
    $sql = "INSERT INTO estudiantes (nombres, apellido, dni, codigo, direccion, telefono, estado) VALUES ('$nombres', '$apellido', '$dni', '$codigo', '$direccion', '$telefono', '$estado')";
    if ($conn->query($sql) === TRUE) {
        header("Location: estudiantes.php");
        exit;
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    $conn->close();   
}
?>
