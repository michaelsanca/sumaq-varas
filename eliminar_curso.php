<?php
include 'funciones.php';
    $id = $_GET['id'];
    $conn = conectarBD();
    $stmt = $conn->prepare("DELETE FROM cursos WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header('Location: cursos.php');
        exit;
    } else {
        echo "No se pudo eliminar: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();

?>