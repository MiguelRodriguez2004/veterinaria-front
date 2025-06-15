<?php
require_once '../Models/connection.php';
session_start();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = $connection->prepare("DELETE FROM citas WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $_SESSION['mensaje'] = "Cita eliminada correctamente.";
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar cita: " . $e->getMessage();
    }
} else {
    $_SESSION['mensaje'] = "ID inválido para eliminar la cita.";
}

header("Location: ../Views/listar_citas.php");