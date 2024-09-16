<?php
include 'funciones.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = conectarBD();
    $sql = "DELETE FROM inscripciones WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Inscripción eliminada correctamente.</div>";
        header("Location: inscripciones.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar la inscripción: " . $stmt->error . "</div>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "<div class='alert alert-danger'>ID no recibido.</div>";
    exit();
}
?>
