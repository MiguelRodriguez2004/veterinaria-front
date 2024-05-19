<?php

session_start();

if (!empty($_POST["btnAccess"])) {
    if (!empty($_POST["user"]) and !empty($_POST["password"])) {

        $user = $_POST['user'];
        $password = md5($_POST['password']);

        $sql = $connection->prepare("SELECT * FROM users WHERE user=:user AND password=:password");
        $sql->bindParam(':user', $user, PDO::PARAM_STR);
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->execute();

        if ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
            
            $_SESSION['name'] = $data['name'];
            $_SESSION['last_name'] = $data['last_name'];

            header("location:../bienvenida.php");
        } else {
            echo "<div class='alert alert-danger'>
            El usuario no existe.
            </div>";
        }

    } else {
        echo "<div class='alert alert-danger'>
        Los campos están vacíos
        </div>";
    }
}

?>
