<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Inscripciones</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
    <?php 
    include 'header.php'; 
    include 'funciones.php'; 

    // Verificar si se ha recibido un ID de inscripción
    if (isset($_GET['id'])) {
        $conn = conectarBD();
        $id = $_GET['id'];
        $sql = "SELECT id_estudiante, id_curso, fecha_inscripcion FROM inscripciones WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $inscripcion = $result->fetch_assoc();
        } else {
            echo "<div class='alert alert-danger'>Inscripción no encontrada.</div>";
            exit();
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "<div class='alert alert-danger'>ID no recibido.</div>";
        exit();
    }

    // Procesar la solicitud de actualización
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_estudiante = $_POST['id_estudiante'];
        $id_curso = $_POST['id_curso'];
        $fecha_inscripcion = $_POST['fecha_inscripcion'];
        $id = $_POST['id'];
        $conn = conectarBD();
        $sql = "UPDATE inscripciones SET id_estudiante = ?, id_curso = ?, fecha_inscripcion = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisi", $id_estudiante, $id_curso, $fecha_inscripcion, $id);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Datos actualizados correctamente.</div>";
            header("Location: inscripciones.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al actualizar los datos: " . $stmt->error . "</div>";
        }
        $stmt->close();
        $conn->close();
    }
    ?>

    <div class="container mt-4">
        <form action="modificar_inscripcion.php?id=<?php echo $id; ?>" method="post" class="mx-auto mt-5 p-4" style="max-width: 500px; background-color: #f8f9fa; border-radius: 10px;">
            <h2>Modificar Inscripción</h2>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <input type="text" class="form-control mb-2" id="id_estudiante" name="id_estudiante" placeholder="ID Estudiante" value="<?php echo htmlspecialchars($inscripcion['id_estudiante']); ?>">
                <input type="text" class="form-control mb-2" id="id_curso" name="id_curso" placeholder="ID Curso" value="<?php echo htmlspecialchars($inscripcion['id_curso']); ?>">
                <input type="date" class="form-control mb-2" id="fecha_inscripcion" name="fecha_inscripcion" placeholder="Fecha de Inscripción" value="<?php echo htmlspecialchars($inscripcion['fecha_inscripcion']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</body>
</html>
