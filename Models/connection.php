<?php
try {
    $connection = new PDO("mysql:host=localhost;dbname=sistema_citas;port=3306;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set("America/Bogota");
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
