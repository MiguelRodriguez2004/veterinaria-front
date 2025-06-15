<?php 

require_once '../Models/connection.php';

function obtenerEspecialidades($connection) {
    $stmt = $connection->query("SELECT DISTINCT speciality FROM profesionales");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>