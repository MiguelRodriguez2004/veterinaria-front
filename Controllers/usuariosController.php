<?php 

require_once '../Models/connection.php';

function obtenerUsuarios($connection) {
    $sql = $connection->prepare("
        SELECT 
            u.id,
            u.name,
            u.last_name,
            u.email,
            r.name AS rol,
            p.speciality,
            p.license_num
        FROM usuarios u
        LEFT JOIN profesionales p ON u.id = p.user_id
        LEFT JOIN roles r ON u.role_id = r.id
    ");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
