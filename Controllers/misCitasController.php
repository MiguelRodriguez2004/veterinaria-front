<?php
require_once '../Models/connection.php';

function obtenerMisCitas($connection) {
    
    $doctor_id = $_SESSION['usuario']['id'];
    
    $sql = $connection->prepare("
        SELECT 
            c.id AS cita_id,
            u.name AS paciente_nombre,
            u.last_name AS paciente_apellido,
            c.date,
            c.time,
            c.status,
            c.notes
        FROM citas c
        JOIN usuarios u ON c.user_id = u.id
        WHERE c.doctor_id = :doctor_id
        ORDER BY c.date, c.time
    ");
    $sql->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
