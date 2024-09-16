<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Administrador</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
<?php
include 'funciones.php';
include 'header.php';

if (isset($_GET['id'])) {
    $conn = conectarBD();
    $id = $_GET['id'];
    $sql = "SELECT nombre, apellidos, dni, codigo, rol FROM administradores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
    } else {
        echo "Administrador no encontrado.";
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
    $apellidos = $_POST['apellidos_mod'];
    $dni = $_POST['dni_mod'];
    $codigo = $_POST['codigo_mod'];
    $rol = $_POST['rol_mod'];
    $id = $_POST['id'];
    $conn = conectarBD();
    $sql = "UPDATE administradores SET nombre = ?, apellidos = ?, dni = ?, codigo = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $apellidos, $dni, $codigo, $rol, $id);
    if ($stmt->execute()) {
        header("Location: administrador.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<form action="modificar_administrador.php?id=<?php echo $id; ?>" method="post" class="mx-auto mt-5 p-4" style="max-width: 500px; background-color: #f8f9fa; border-radius: 10px;">
    <h1>MODIFICAR ADMINISTRADOR</h1>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <input type="text" class="form-control" id="nombre_mod" name="nombre_mod" placeholder="Nombre" value="<?php echo $admin['nombre']; ?>">
        <input type="text" class="form-control" id="apellido_mod" name="apellidos_mod" placeholder="Apellidos" value="<?php echo $admin['apellidos']; ?>">
        <input type="text" class="form-control" id="dni_mod" name="dni_mod" placeholder="DNI" value="<?php echo $admin['dni']; ?>">
        <input type="text" class="form-control" id="codigo_mod" name="codigo_mod" placeholder="Código de solo 4 dígitos" value="<?php echo $admin['codigo']; ?>">
        <input type="text" class="form-control" id="rol_mod" name="rol_mod" placeholder="Ingrese su rol" value="<?php echo $admin['rol']; ?>">

    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
</form>
</body>
</html>
