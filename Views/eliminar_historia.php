<?php
session_start();
if (empty($_SESSION['name']) && !empty($_SESSION['last_name'])) {
    header('location: login/login.php');
}

require_once '../Controllers/vetController.php';

$controller = new VetController('http://localhost:4000/api/vet');

if (isset($_GET['history_id'])) {
    $history_id = $_GET['history_id'];

    // Intentar eliminar el registro con el history_id proporcionado
    $result = $controller->deleteVet($history_id);

    // Verificar si la eliminación fue exitosa
    if (isset($result['error'])) {
        // Si hay un error, redirigir con un mensaje de error
        header('Location: inicio.php?message=error');
        exit;
    } else {
        // Si la eliminación fue exitosa, redirigir con un mensaje de éxito
        header('Location: inicio.php?message=success');
        exit;
    }
} else {
    // Si no se proporciona un history_id, redirigir a la página principal
    header('Location: inicio.php');
    exit;
}