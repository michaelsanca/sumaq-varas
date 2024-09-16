<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Login</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/login.css">
    <style>
       .login-contenedor {
    height: 100vh;
    margin: 0;
    font-family: 'Indie Flower', cursive;
    background: linear-gradient(to top, rgba(30, 35, 38, 0.8), rgba(30, 35, 38, 1)), 
    url('img/fondo.webp');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
} 
    </style>
</head>
<body>
    <div class="login-contenedor">
        <div class="login-box">
            <img src="img/logo.png" alt="User Icon">
            <h2>Bienvenido</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ingrese DNI" name="dni" required>
                    <input type="password" class="form-control" placeholder="Ingrese Codigo" name="codigo" required>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="estudiante" value="estudiante" name="role">
                        <label class="form-check-label" for="estudiante">Estudiante</label>
                        <input class="form-check-input" type="checkbox" id="director" value="director" name="role">
                        <label class="form-check-label" for="director">Director</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary"><a href="index.php">Volver</a></button>
                    <button type="submit" class="btn btn-secondary">Ingresar</button>
                </div>
                <?php
                    session_start();
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        include 'funciones.php';
                        $dni = $_POST['dni'];
                        $codigo = $_POST['codigo'];
                        $role = $_POST['role'];
                        $conn = conectarBD();
                        if ($role == 'director') {
                            $sql = "SELECT nombre, apellidos FROM administradores WHERE dni = ? AND codigo = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $dni, $codigo);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $usuario = $result->fetch_assoc();
                                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                                $_SESSION['usuario_apellidos'] = $usuario['apellidos'];
                                $_SESSION['usuario_rol'] = $role;
                                header("Location: configuracion.php");
                                exit();
                            } else {
                                echo '<div class="alert alert-danger mt-3">DNI o código incorrectos para director.</div>';
                            }
                        } elseif ($role == 'estudiante') {
                            $sql = "SELECT * FROM estudiantes WHERE dni = ? AND codigo = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $dni, $codigo);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                $student = $result->fetch_assoc();
                                echo '<div class="alert alert-success mt-3">Estudiante Encontrado:</div>';
                                echo '<table class="table table-bordered mt-3" style="color: white;">';
                                echo '<tbody>';
                                echo '<tr><th>DNI</th><td>' . $student['dni'] . '</td></tr>';
                                echo '<tr><th>Nombres</th><td>' . $student['nombres'] . '</td></tr>';
                                echo '<tr><th>Apellido</th><td>' . $student['apellido'] . '</td></tr>';
                                echo '<tr><th>Dirección</th><td>' . $student['direccion'] . '</td></tr>';
                                echo '<tr><th>Teléfono</th><td>' . $student['telefono'] . '</td></tr>';
                                echo '<tr><th>Estado</th><td>' . $student['estado'] . '</td></tr>';
                                echo '</tbody>';
                                echo '</table>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">DNI o código incorrectos para estudiante.</div>';
                            }
                        }
                        else {
                            echo '<div class="alert alert-danger mt-3">falta seleccionar rol</div>';
                        }
                        $stmt->close();
                        $conn->close();
                    }
                    ?>

            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('input[name="role"]').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                document.querySelectorAll('input[name="role"]').forEach(function (cb) {
                    if (cb !== checkbox) cb.checked = false;
                });
            });
        });
    </script>
</body>
</html>
