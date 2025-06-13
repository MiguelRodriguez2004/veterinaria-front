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
        <table class="table table-bordered" id="example">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
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
                        <td><?= htmlspecialchars($usuario['rol']) ?></td>
                        <td><?= $usuario['rol'] === 'Profesional' ? htmlspecialchars($usuario['speciality']) : '-' ?></td>
                        <td><?= $usuario['rol'] === 'Profesional' ? htmlspecialchars($usuario['license_num']) : '-' ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('./layout/footer.php'); ?>