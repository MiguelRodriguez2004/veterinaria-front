<?php
require_once '../Models/connection.php';
session_start();

if (!empty($_POST['id']) && !empty($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    try {
        $sql = $connection->prepare("UPDATE citas SET status = :status WHERE id = :id");
        $sql->bindParam(':status', $status, PDO::PARAM_STR);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $_SESSION['mensaje'] = "Estado de la cita actualizado.";
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al actualizar estado: " . $e->getMessage();
    }
} else {
    $_SESSION['mensaje'] = "Datos incompletos para actualizar estado.";
}

header("Location: ../Views/listar_citas.php");
