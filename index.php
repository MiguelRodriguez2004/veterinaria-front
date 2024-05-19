<?php

session_start();

if (empty($_SESSION['user']) && empty($_SESSION['password'])) {
    header('location: ./Views/login/login.php');
} else {
    // Redirige al usuario a la vista de inicio si está autenticado
    header('location: ./Views/bienvenida.php');
}

