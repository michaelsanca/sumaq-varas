<?php
// Incluye el archivo funciones.php usando una ruta relativa
include 'funciones.php';

// Verifica si se ha recibido el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Llama a la función conectarBD() definida en funciones.php
    $conn = conectarBD();
    $stmt = $conn->prepare("DELETE FROM solicitud WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header('Location: solicitud.php');
        exit;
    } else {
        echo "No se pudo eliminar: " . $stmt->error;
    }

    // Cierra la sentencia y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "No se ha proporcionado un ID válido.";
}
?>
