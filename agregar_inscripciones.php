<?php
include 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estudiante = $_POST['id_estudiante'];
    $id_curso = $_POST['id_curso'];
    $fecha_inscripcion = $_POST['fecha_inscripcion'];
    $fecha_inscripcion = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_inscripcion)));
    $conn = conectarBD();

    $result_estudiante = $conn->query("SELECT * FROM estudiantes WHERE id_estudiante = '$id_estudiante'");
    if ($result_estudiante->num_rows == 0) {
        header("Location: inscripciones.php");
        exit;
    }

    $result_curso = $conn->query("SELECT * FROM cursos WHERE id_curso = '$id_curso'");
    if ($result_curso->num_rows == 0) {
        echo " El curso no existe.";
        header("Location: inscripciones.php");
        exit;
    }

    $sql = "INSERT INTO inscripciones (id_estudiante, id_curso, fecha_inscripcion) VALUES ('$id_estudiante', '$id_curso', '$fecha_inscripcion')";
    if ($conn->query($sql) === TRUE) {
        header("Location: inscripciones.php");
        exit;
    } else {
        echo "No se pudo agregar: " . $conn->error;
    }

    $conn->close();   
}
?>
