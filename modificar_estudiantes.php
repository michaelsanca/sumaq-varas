<?php
include 'funciones.php';

if (isset($_GET['id'])) {
    $conn = conectarBD();
    $id = $_GET['id'];
    $sql = "SELECT nombres, apellido, dni, codigo, direccion, telefono, estado FROM estudiantes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $estudiante = $result->fetch_assoc();
    } else {
        echo "Estudiante no encontrado.";
        exit();
    }
    $stmt->close();
    $conn->close();
} else {
    echo "ID no recibido.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_mod'];
    $apellido = $_POST['apellido_mod'];
    $dni = $_POST['dni_mod'];
    $codigo = $_POST['codigo_mod'];
    $direccion = $_POST['direccion_mod'];
    $telefono = $_POST['telefono_mod'];
    $estado = $_POST['estado_mod'];
    $id = $_POST['id'];
    $conn = conectarBD();
    $sql = "UPDATE estudiantes SET nombres = ?, apellido = ?, dni = ?, codigo = ?, direccion = ?, telefono = ?, estado = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $nombre, $apellido, $dni, $codigo, $direccion, $telefono, $estado, $id);
    if ($stmt->execute()) {
        header("Location: estudiantes.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Estudiante</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
<?php include 'header.php'; ?>

<form action="modificar_estudiantes.php?id=<?php echo $id; ?>" method="post" class="mx-auto mt-5 p-4" style="max-width: 500px; background-color: #f8f9fa; border-radius: 10px;">
    <h1>Modificar Estudiante</h1>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <input type="text" class="form-control" id="nombre_mod" name="nombre_mod" placeholder="Nombres" value="<?php echo $estudiante['nombres']; ?>" required>
        <input type="text" class="form-control" id="apellido_mod" name="apellido_mod" placeholder="Apellido" value="<?php echo $estudiante['apellido']; ?>" required>
        <input type="text" class="form-control" id="dni_mod" name="dni_mod" placeholder="DNI" value="<?php echo $estudiante['dni']; ?>" required>
        <input type="text" class="form-control" id="codigo_mod" name="codigo_mod" placeholder="Código" value="<?php echo $estudiante['codigo']; ?>" required>
        <input type="text" class="form-control" id="direccion_mod" name="direccion_mod" placeholder="Dirección" value="<?php echo $estudiante['direccion']; ?>" required>
        <input type="text" class="form-control" id="telefono_mod" name="telefono_mod" placeholder="Teléfono" value="<?php echo $estudiante['telefono']; ?>" required>
        <select class="form-control" id="estado_mod" name="estado_mod" required>
            <option value="activo" <?php if ($estudiante['estado'] == 'activo') echo 'selected'; ?>>Activo</option>
            <option value="inactivo" <?php if ($estudiante['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
</form>
</body>
</html>
