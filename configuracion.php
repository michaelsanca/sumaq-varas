<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas - Configuración</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        body {
            background-color: #1e2326;
            color: white;
        }
        .content {
            margin: 20px;
        }
        .card {
            transition: transform 0.3s ease;
            
            border: none; 
            
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card:hover {
            transform: scale(0.98);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #1e2326;
        }
        .icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: white;
        }
        h2 {
            font-weight: bold;
            margin-bottom: 30px;
            text-align: left;
        }
        .statistics {
            margin-top: 20px;
        }
        .statistics h1 {
            font-size: 3rem;
            color: white;
        }
        .statistics .card-body h1 {
            font-size: 2rem;
            margin-bottom: 0;
        }
        .card-title {
            font-size: 1.2rem;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php 
include 'header.php'; 
include 'funciones.php'; 
?>
<div class="content">
    <h2>Panel De Configuración y Vista</h2>
    <div class="row statistics">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1><i class="icon fas fa-user-graduate"></i>Estudiantes </h1>
                    
                    <?php
                        $conexion = conectarBD();
                        $result = $conexion->query("SELECT COUNT(*) as total FROM estudiantes");
                        $data = $result->fetch_assoc();
                        echo "<h1>" . $data['total'] . "</h1>";
                        $conexion->close();
                    ?>
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1><i class="icon fas fa-user"></i>Admin </h1>
                    
                    <?php
                        $conexion = conectarBD();
                        $result = $conexion->query("SELECT COUNT(*) as total FROM administradores");
                        $data = $result->fetch_assoc();
                        echo "<h1>" . $data['total'] . "</h1>";
                        $conexion->close();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1><i class="icon fas fa-book"></i>Cursos </h1>
                    
                    <?php
                        $conexion = conectarBD();
                        $result = $conexion->query("SELECT COUNT(*) as total FROM cursos");
                        $data = $result->fetch_assoc();
                        echo "<h1>" . $data['total'] . "</h1>";
                        $conexion->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
