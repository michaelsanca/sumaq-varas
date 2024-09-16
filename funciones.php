<?php
function conectarBD() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "sumaq_varas";
    $connect=mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);
    return $connect;
}

?>
