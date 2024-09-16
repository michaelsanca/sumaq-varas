<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
}
header("Location: login.php");
exit;
?>
