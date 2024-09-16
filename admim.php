<?php
include 'funciones.php'; // Archivo que contiene la función de conexión a la base de datos

    $dni = $_POST['dni'];
    $codigo = $_POST['codigo'];
    $role = $_POST['role'];

    $conn = conectarBD(); 

    if ($role == 'director') {
        // Verificar en la tabla administradores
        $sql = "SELECT * FROM administradores WHERE dni = ? AND codigo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $dni, $codigo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Director autenticado correctamente
            header("Location: administrador.php");
            exit();
        } else {
            echo "DNI o código incorrectos para director.";
        }
    } elseif ($role == 'estudiante') {
        // Verificar en la tabla estudiantes
        $sql = "SELECT * FROM estudiantes WHERE dni = ? AND codigo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $dni, $codigo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Estudiante autenticado correctamente
            header("Location: estudiante.php");
            exit();
        } else {
            echo "DNI o código incorrectos para estudiante.";
        }
    } else {
        echo "seleccione si es estudiante o administrador";
    }
    $stmt->close();
    $conn->close();
?>

