<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Cursos</title>
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


        <h2>cursos</h2>
        <div class="row">
            <div class="col-md-6">
                <form action="agregar_curso.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="nombre" name="nombre" placeholder="Nombre del Curso">
                        <textarea class="form-control mb-2" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del Curso"></textarea>
                        <input type="text" class="form-control mb-2" id="profesor" name="profesor" placeholder="Profesor">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div>

            <div class="col-md-6">
                <form action="cursos.php" method="post" class="form-inline">
                    <input type="text" name="buscar" id="buscar" class="form-control mr-2" placeholder="Ingrese el nombre del curso">
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                </form>
                <?php
                        if(isset($_POST['buscar'])) {
                            $buscar = $_POST['buscar'];
                            $conn = conectarBD();

                            $sql = "SELECT * FROM cursos WHERE nombre = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('s', $buscar);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                echo '<div class="alert alert-info mt-4">';
                                $row = $result->fetch_assoc();
                                echo "Nombre: " . $row['nombre'] . "<br>";
                                echo "discripcion: " . $row['descripcion'] . "<br>";
                                echo "profesor: " . $row['profesor'] . "<br>";
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-warning mt-4">No se encontraron resultados del curso.</div>';
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
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Profesor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $conn = conectarBD();

                    // Obtener los datos de administradores desde la base de datos
                    $sql = "SELECT * FROM cursos";
                    $result = $conn->query($sql);

                    // Mostrar los datos en la tabla
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["nombre"] . "</td>
                                    <td>" . $row["descripcion"] . "</td>
                                    <td>" . $row["profesor"] . "</td>
                                    <td>
                                    <a href='modificar_curso.php?id=" . $row["id"] . "' class='btn btn-sm btn-primary'>
                                    <i class='fa fa-edit'></i>
                                </a>
                                
                                
                                        <a href='eliminar_curso.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay cursos registrados</td></tr>";
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
