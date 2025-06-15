<?php
require_once '../Models/connection.php';
session_start();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $sql = $connection->prepare("DELETE FROM profesionales WHERE user_id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $sql = $connection->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
        header("Location: ../Views/listar_usuarios.php");
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar el usuario: " . $e->getMessage();
        header("Location: ../Views/listar_usuarios.php");
    }
} else {
    $_SESSION['mensaje'] = "ID inválido para eliminar.";
    header("Location: ../Views/listar_usuarios.php");
}
