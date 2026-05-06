<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'incolbqx_fran');
define('DB_PASS', 'Fran2934152015');
define('DB_NAME', 'incolbqx_demeritos');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Función para verificar si el usuario tiene un rol específico
function verificarRol($rol_requerido) {
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }
    
    if ($_SESSION['user']['rol'] != $rol_requerido) {
        // Redirigir al dashboard correspondiente según su rol
        if ($_SESSION['user']['rol'] == 'admin') {
            header('Location: admin/dashboard.php');
        } else {
            header('Location: profesor/dashboard.php');
        }
        exit();
    }
}

// Función para verificar si el usuario está logueado (cualquier rol)
function verificarSesion() {
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }
}
?>
