<?php
session_start();
require_once './layout/topbar.php';
require_once './layout/sidebar.php';
require_once '../Controllers/consultarEspecialidades.php';

$especialidades = obtenerEspecialidades($connection);

?>

<div class="page-content">
    <div class="container">
        <h3 class="text-center text-secondary mb-4">Agendar una cita!</h3>
        <?php if (!empty($_SESSION['mensaje'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>

        <form action="../Controllers/registrarCitaController.php" method="POST" id="formUsuario">
            <div class="mb-3">
                <label>Especialidad:</label>
                <select name="especialidad" id="especialidad" class="form-control" required>
                    <option value="">Seleccione una especialidad</option>
                    <?php foreach ($especialidades as $esp): ?>
                        <option value="<?= $esp['speciality'] ?>"><?= $esp['speciality'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Profesional:</label>
                <select name="profesional_id" id="profesional" class="form-control" required>
                    <option value="">Seleccione un profesional</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Fecha:</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Hora:</label>
                <input type="time" name="hora" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Agendar Cita</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('especialidad').addEventListener('change', function () {
    let especialidad = this.value;

    fetch('../Controllers/obtenerProfesionalesPorEspecialidad.php?especialidad=' + especialidad)
        .then(res => res.json())
        .then(data => {
            let select = document.getElementById('profesional');
            select.innerHTML = '<option value="">Seleccione un profesional</option>';
            data.forEach(prof => {
                select.innerHTML += `<option value="${prof.user_id}">${prof.name}</option>`;
            });
        });
});
</script>

<?php require('./layout/footer.php'); ?>