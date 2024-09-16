
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumaq Varas</title>
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilos/sidebar.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Righteous&family=Work+Sans:wght@100;300;400;600;800&display=swap');
        
        body {
            font-family: "Indie Flower", cursive;
            margin: 0;
        }

        .header {
            background-color: #1e2326;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .sidebar {
            height: calc(100vh - 20px);
            position: fixed;
            top: 30px;
            left: 0;
            width: 15%;
            background-color: #1e2326;
            color: white;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #fff;
            color: black;
        }

        .content {
            margin-left: 15%;
            padding: 20px;
            margin-top: 50px;
        }

        .table-container {
            margin-top: 20px;
        }

        .sidebar a:last-child {
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: auto;
                height: auto;
                position: fixed;
                top: 10px;
                left: 10px;
                background-color: transparent;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                padding-top: 30px;
            }
            .sidebar a {
                display: none;
                color: #1e2326;
            }
            .sidebar a:last-child {
                display: flex;
                font-size: 20px; 
                width: 30px;
                height: 30px;
                background-color: #966eb3;
                color: white;
                border-radius: 50%;
                justify-content: center;
                align-items: center;
                margin: 0;
                padding: 0;
            }
            .sidebar a.logout .text {
                display: none;
                margin: 0;
            }
        }

    </style>
</head>
<body>
    
    <div class="contenedor-header">
        <header>
            <div class="logo">
                <a href="#inicio">
                    <img src="img/logohorizontal.png" alt="Logo">
                </a>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="administrador.php" onclick="seleccionar()"><i class="fas fa-user-shield"></i> Admin</a></li>
                    <li><a href="cursos.php" onclick="seleccionar()"><i class="fas fa-book"></i> Cursos</a></li>
                    <li><a href="estudiantes.php" onclick="seleccionar()"><i class="fas fa-user-graduate"></i> Estudiante</a></li>
                    <li><a href="solicitud.php" onclick="seleccionar()"><i class="fas fa-envelope"></i> Solicitud</a></li>
                    <li class="login"><a href="perfil.php"><i class="fas fa-user"></i> perfil</a></li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </header>
    </div>

    <div class="sidebar">
        <hr>
        <a href="inscripciones.php"><i class="fas fa-calendar-alt"></i> Inscripción al curso</a>
        <a href="configuracion.php"><i class="fas fa-cogs"></i> Configuración</a>
        <a href="exit.php" class="logout"><i class="fas fa-sign-out-alt"></i> <span class="text">Cerrar sesión</span></a>
    </div>

    
    <script src="script.js"></script>
</body>
</html>
