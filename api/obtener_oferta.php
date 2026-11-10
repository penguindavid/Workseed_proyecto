<?php
// api/obtener_ofertas.php

header('Content-Type: application/json');
require_once '../config/conexion.php';

try {
    // Consulta SQL para obtener las ofertas ordenadas por fecha reciente
    $sql = "SELECT o.*, e.Nombres AS NombreEmpleador, e.Apellidos AS ApellidoEmpleador 
            FROM Oferta o
            INNER JOIN Empleador e ON o.ID_Empleador = e.ID_Empleador
            ORDER BY o.Fecha_Publicacion DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $ofertas = $stmt->fetchAll();

    // Responder con los datos recuperados de MySQL
    echo json_encode([
        'status' => 'success',
        'data'   => $ofertas
    ]);

} catch (Exception $e) {
    echo json_encode([
        'status'  => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
