<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="side-menu">
    <ul class="side-menu-list p-0">

        <li class="red">
            <a href="bienvenida.php">
                <img src="../public/img-inicio/house.png" class="img-inicio" alt="">
                <span class="lbl">INICIO</span>
            </a>
        </li>

        <li class="grey with-sub">
            <span>
                <img src="../public/img-inicio/programar.png" class="img-inicio" alt="">
                <span class="lbl">OPCIONES</span>
            </span>
            <ul>
                <?php if ($_SESSION['role_id'] == 1): ?>
                    <li>
                        <a href="crear_usuario.php">
                            <i class="fas fa-user-plus icono-submenu"></i>
                            <span class="lbl">Crear Usuario</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_citas.php">
                            <i class="fas fa-th-list icono-submenu"></i>
                            <span class="lbl">Listado de Citas</span>
                        </a>
                    </li>
                    <li>
                        <a href="listar_usuarios.php">
                            <!-- <i class="fa-solid fa-users icono-submenu"></i> -->
                            <i class="fas fa-users icono-submenu"></i>
                            <span class="lbl">Listado de Usuarios</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role_id'] == 2): ?>
                    <li>
                        <a href="profesional_citas.php">
                            <i class="fas fa-th-list icono-submenu"></i>
                            <span class="lbl">Mis Citas</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role_id'] == 3): ?>
                    <li>
                        <a href="agendar_cita.php">
                            <i class="fas fa-calendar-plus icono-submenu"></i>
                            <span class="lbl">Agendar Cita</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>

        <li class="red">
            <a href="acerca.php">
                <img src="../public/img-inicio/info.png" class="img-inicio" alt="">
                <span class="lbl">ACERCA DE</span>
            </a>
        </li>

    </ul>
</nav>

