<?php
session_start();

if (!empty($_POST["btnAccess"])) {
    if (!empty($_POST["user"]) && !empty($_POST["password"])) {

        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = $connection->prepare("SELECT * FROM usuarios WHERE email = :user LIMIT 1");
        $sql->bindParam(':user', $user, PDO::PARAM_STR);
        $sql->execute();

        if ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            if ($password === $data['password']) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['role_id'] = $data['role_id'];

                switch ($data['role_id']) {
                    case 1:
                        header("location:../bienvenida.php");
                        break;
                    case 2:
                        header("Location: ../doctor/citas_asignadas.php");
                        break;
                    case 3:
                        header("Location: ../user/agendar_cita.php");
                        break;
                    default:
                        echo "<div class='alert alert-warning'>Rol no reconocido.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Contraseña incorrecta.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>El usuario no existe.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Los campos están vacíos.</div>";
    }
}

?>