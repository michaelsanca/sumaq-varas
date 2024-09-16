<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Solicitudes</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'funciones.php'; ?>

    <div class="content">
        <h2>Solicitudes de Posibles estudiantes</h2>
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>DNI</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = conectarBD();
                    $sql = "SELECT id, nombre, apellido, telefono, dni FROM solicitud";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["nombre"] . "</td>
                                    <td>" . $row["apellido"] . "</td>
                                    <td>" . $row["telefono"] . "</td>
                                    <td>" . $row["dni"] . "</td>
                                    <td>
                                        <a href='eliminar_solicitud.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay solicitudes</td></tr>";
                    }                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
