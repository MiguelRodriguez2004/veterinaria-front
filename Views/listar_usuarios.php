<?php
session_start();
require_once './layout/topbar.php';
require_once './layout/sidebar.php';
require_once '../Controllers/usuariosController.php';

$usuarios = obtenerUsuarios($connection);
?>

<div class="page-content">
    <div class="container">
        <h4 class="mb-4">Listado de Usuarios</h4>
        <?php if (!empty($_SESSION['mensaje'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered" id="example">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Rol</th>
                    <th>Especialidad</th>
                    <th>Nº Licencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= htmlspecialchars($usuario['name']) ?></td>
                        <td><?= htmlspecialchars($usuario['last_name']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= htmlspecialchars($usuario['sex'] === 'F' ? 'Femenino' : 'Masculino') ?></td>
                        <td><?= htmlspecialchars($usuario['rol']) ?></td>
                        <td><?= $usuario['rol'] === 'Profesional' ? htmlspecialchars($usuario['speciality']) : '-' ?></td>
                        <td><?= $usuario['rol'] === 'Profesional' ? htmlspecialchars($usuario['license_num']) : '-' ?></td>
                        <td>
                            <a href="../Controllers/eliminarUsuariosController.php?id=<?= $usuario['id'] ?>" 
                                class="btn btn-sm btn-danger" 
                                onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('./layout/footer.php'); ?>