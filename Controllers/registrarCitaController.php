<?php
require_once '../Models/connection.php';
session_start();

if (!empty($_POST['profesional_id']) && !empty($_POST['fecha']) && !empty($_POST['hora'])) {
    $paciente_id = $_SESSION['usuario']['id'];
    $profesional_id = $_POST['profesional_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $estado = 'pendiente';

    $stmt = $connection->prepare("SELECT COUNT(*) FROM citas WHERE doctor_id = :doctor_id AND date = :date AND time = :time");
    $stmt->bindParam(':doctor_id', $profesional_id, PDO::PARAM_INT);
    $stmt->bindParam(':date', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':time', $hora, PDO::PARAM_STR);
    $stmt->execute();

    $existe = $stmt->fetchColumn();

    if ($existe > 0) {
        $_SESSION['mensaje'] = "El profesional ya tiene una cita agendada en esa fecha y hora.";
        header("Location: ../Views/agendar_cita.php");
        exit;
    }

    try {
        $sql = $connection->prepare("INSERT INTO citas (user_id, doctor_id, date, time, status, notes, created_at) VALUES (?, ?, ?, ?, ?, NULL, NOW())");
        $sql->execute([$paciente_id, $profesional_id, $fecha, $hora, $estado]);

        $_SESSION['mensaje'] = "Cita agendada exitosamente.";
        header("Location: ../Views/agendar_cita.php");
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al agendar la cita: " . $e->getMessage();
        header("Location: ../Views/agendar_cita.php");
    }
}
