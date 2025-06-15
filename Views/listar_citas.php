<?php

session_start();
require_once './layout/topbar.php';
require_once './layout/sidebar.php';
require_once '../Controllers/listarCitasController.php';

$citas = obtenerCitas($connection);
?>

<div class="page-content">
    <div class="container">
        <h4 class="mb-4">Listado de Citas</h4>
        <?php if (!empty($_SESSION['mensaje'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered" id="example">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Profesional</th>
                    <th>Especialidad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $cita): ?>
                    <tr>
                        <td><?= $cita['cita_id'] ?></td>
                        <td><?= $cita['paciente_nombre'] . ' ' . $cita['paciente_apellido'] ?></td>
                        <td><?= $cita['doctor_nombre'] . ' ' . $cita['doctor_apellido'] ?></td>
                        <td><?= $cita['speciality'] ?></td>
                        <td><?= $cita['date'] ?></td>
                        <td><?= $cita['time'] ?></td>
                        <!-- Cambiar estado -->
                        <td>
                            <form action="../Controllers/cambiarEstadoCitaController.php" method="POST">
                                <input type="hidden" name="id" value="<?= $cita['cita_id'] ?>">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pendiente" <?= $cita['status'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                    <option value="finalizada" <?= $cita['status'] == 'finalizada' ? 'selected' : '' ?>>Finalizada</option>
                                </select>
                            </form>
                        </td>
                        <td><?= $cita['notes'] ?></td>
                        <!-- Botón eliminar -->
                        <td>
                            <a href="../Controllers/eliminarCitaController.php?id=<?= $cita['cita_id'] ?>" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('¿Seguro que deseas eliminar esta cita?')">
                            Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require('./layout/footer.php'); ?>