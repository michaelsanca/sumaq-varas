<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Estudiantes</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="estilos/estilos_header.css">
</head>
<body>
    <?php 
    include 'header.php'; 
    include 'funciones.php'; 
    ?>
    <div class="content">
        <h2>Estudiantes</h2>
        <div class="row">
            <div class="col-md-6">
            <form action="agregar_estudiante.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="nombre" name="nombres" placeholder="Nombres" required>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" required>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" required>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código" required>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="" disabled selected>Estado</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            </div>

            <div class="col-md-6">
                <form action="estudiantes.php" method="post" class="form-inline">
                    <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese DNI a Buscar">
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                </form>
                <?php
                        if(isset($_POST['buscar'])) {
                            $buscar = $_POST['buscar'];
                            $conn = conectarBD();

                            $sql = "SELECT * FROM estudiantes WHERE dni = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('s', $buscar);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                echo '<div class="alert alert-info mt-4">';
                                $row = $result->fetch_assoc();
                                echo "DNI: " . $row['dni'] . "<br>";
                                echo "Nombres: " . $row['nombres'] ." ".$row['apellido'] . "<br>";
                                echo "telefono: " . $row['telefono'] . "<br>";
                                echo "estado: " . $row['estado'] . "<br>";
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-warning mt-4">No se encontraron datos del estudiante</div>';
                            }

                            $stmt->close();
                            $conn->close();
                        }
                ?>
            </div>
        </div>










































        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Código</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <tbody>
                    <?php
                    $conn = conectarBD();
                    $sql = "SELECT * FROM estudiantes";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["nombres"] . "</td>
                                    <td>" . $row["apellido"] . "</td>
                                    <td>" . $row["dni"] . "</td>
                                    <td>" . $row["codigo"] . "</td>
                                    <td>" . $row["direccion"] . "</td>
                                    <td>" . $row["telefono"] . "</td>
                                    <td>" . $row["estado"] . "</td>
                                    <td>
                                    <a href='modificar_estudiantes.php?id=" . $row["id"] . "' class='btn btn-sm btn-primary'>
                                    <i class='fa fa-edit'></i>
                                </a>
                                
                                
                                        <a href='eliminar_estudiantes.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay administradores registrados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>
</html>
