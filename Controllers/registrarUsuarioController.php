<?php
require_once '../Models/connection.php';

if (isset($_POST['btnCrearUsuario'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $sex = $_POST['sex'];

      try {
        
        $connection->beginTransaction();

        $stmt = $connection->prepare("INSERT INTO usuarios (name, last_name, email, password, role_id, sex) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $last_name, $email, $password, $role_id, $sex]);

        $usuario_id = $connection->lastInsertId();

        if ($role_id == 2) {
            $speciality = $_POST["speciality"] ?? '';
            $license_num = $_POST["license_num"] ?? '';

            $stmtProf = $connection->prepare("INSERT INTO profesionales (user_id, speciality, license_num) VALUES (?, ?, ?)");
            $stmtProf->execute([$usuario_id, $speciality, $license_num]);
        }

        $connection->commit();

        header("Location: ../Views/listar_usuarios.php?success=1");
        exit;

    } catch (PDOException $e) {
        $connection->rollBack();
        echo "<div class='alert alert-danger'>Error al registrar el usuario: " . $e->getMessage() . "</div>";
    }

} else {
    echo "<div class='alert alert-danger'>Acceso no permitido</div>";
}