<?php
require_once '../Models/connection.php';

if (!empty($_GET['especialidad'])) {
    $especialidad = $_GET['especialidad'];

    $sql = $connection->prepare("
        SELECT p.user_id, u.name
        FROM profesionales p
        INNER JOIN usuarios u ON p.user_id = u.id
        WHERE p.speciality = :especialidad
    ");
    $sql->bindParam(':especialidad', $especialidad, PDO::PARAM_STR);
    $sql->execute();

    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
}
