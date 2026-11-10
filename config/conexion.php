<?php
// config/conexion.php

$host     = 'localhost';
$dbname   = 'workseed_db';
$username = 'root'; // Usuario por defecto en XAMPP
$password = '';     // Contraseña por defecto (vacía en XAMPP)

try {
    // Crear instancia de conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // Detener la ejecución si la conexión falla
    die(json_encode([
        'status'  => 'error',
        'message' => 'Error al conectar con la Base de Datos: ' . $e->getMessage()
    ]));
}
?>
