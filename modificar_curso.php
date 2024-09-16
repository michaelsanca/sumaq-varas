<?php
include 'funciones.php';

if (isset($_GET['id'])) {
    $conn = conectarBD();
    $id = $_GET['id'];
    $sql = "SELECT nombre, descripcion, profesor FROM cursos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $curso = $result->fetch_assoc();
    } else {
        echo "Curso no encontrado.";
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
    $descripcion = $_POST['descripcion_mod'];
    $profesor = $_POST['profesor_mod'];
    $id = $_POST['id'];
    $conn = conectarBD();
    $sql = "UPDATE cursos SET nombre = ?, descripcion = ?, profesor = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $descripcion, $profesor, $id);
    if ($stmt->execute()) {
        header("Location: cursos.php");
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
    <title>Modificar Curso</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
<?php include 'header.php'; ?>

<form action="modificar_curso.php?id=<?php echo $id; ?>" method="post" class="mx-auto mt-5 p-4" style="max-width: 500px; background-color: #f8f9fa; border-radius: 10px;">
    <h1>MODIFICAR CURSO</h1>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <input type="text" class="form-control" id="nombre_mod" name="nombre_mod" placeholder="Nombre del Curso" value="<?php echo $curso['nombre']; ?>">
        <textarea class="form-control" id="descripcion_mod" name="descripcion_mod" rows="3" placeholder="Descripción del Curso"><?php echo $curso['descripcion']; ?></textarea>
        <input type="text" class="form-control" id="profesor_mod" name="profesor_mod" placeholder="Profesor" value="<?php echo $curso['profesor']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
</form>
</body>
</html>
