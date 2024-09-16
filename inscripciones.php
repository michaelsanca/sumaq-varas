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
    ?>
    <div class="content">
        <h2>Inscripciones</h2>
                <div class="col-md-6">
                    <form action="agregar_inscripciones.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" placeholder="ID Estudiante">
                            <input type="text" class="form-control" id="id_curso" name="id_curso" placeholder="ID Curso">
                            <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion"  placeholder="Fecha de Inscripción">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
    








        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Estudiante</th>
                        <th>ID Curso</th>
                        <th>Fecha de Inscripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $conn = conectarBD();

                    // Obtener los datos de administradores desde la base de datos
                    $sql = "SELECT * FROM inscripciones";
                    $result = $conn->query($sql);

                    // Mostrar los datos en la tabla
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id_estudiante"] . "</td>
                                    <td>" . $row["id_curso"] . "</td>
                                    <td>" . $row["fecha_inscripcion"] . "</td>
                                    <td>
                                    <a href='modificar_inscripcion.php?id=" . $row["id"] . "' class='btn btn-sm btn-primary'>
                                    <i class='fa fa-edit'></i>
                                </a>
                                
                                
                                        <a href='eliminar_inscripcion.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay inscripciones aun</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>
