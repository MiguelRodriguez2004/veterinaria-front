<?php

require_once '../Models/connection.php';

function obtenerCitas($connection) {
    $sql = $connection->query("SELECT 
            c.id AS cita_id,
            u.name AS paciente_nombre,
            u.last_name AS paciente_apellido,
            p_user.name AS doctor_nombre,
            p_user.last_name AS doctor_apellido,
            prof.speciality,
            c.date,
            c.time,
            c.status,
            c.notes
        FROM citas c
        JOIN usuarios u ON c.user_id = u.id
        JOIN usuarios p_user ON c.doctor_id = p_user.id
        JOIN profesionales prof ON prof.user_id = p_user.id
        ORDER BY c.date, c.time;
    ");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
