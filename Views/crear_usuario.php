<?php
session_start();
require('./layout/topbar.php'); 
require('./layout/sidebar.php'); 
?>

<div class="page-content">
    <div class="container">
        <h3 class="text-center text-secondary mb-4">Crear Usuario</h3>

        <form action="../Controllers/registrarUsuarioController.php" method="POST" id="formUsuario">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="sex_id" class="form-label">Sexo</label>
                <select name="sex" class="form-select" id="sexSelect" required>
                    <option value="" selected disabled>Seleccione su sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="role_id" class="form-label">Rol</label>
                <select name="role_id" class="form-select" id="rolSelect" required>
                    <option value="" selected disabled>Seleccione un rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Profesional (Médico)</option>
                    <option value="3">Usuario (Paciente)</option>
                </select>
            </div>

            <div id="camposProfesional" style="display: none;">
                <div class="mb-3">
                    <label for="speciality" class="form-label">Especialidad</label>
                    <select name="speciality" class="form-select">
                        <option value="" selected disabled>Seleccione una especialidad</option>
                        <option value="Medicina General">Medicina General</option>
                        <option value="Pediatría">Pediatría</option>
                        <option value="Ginecología">Ginecología</option>
                        <option value="Dermatología">Dermatología</option>
                        <option value="Cardiología">Cardiología</option>
                        <option value="Neurología">Neurología</option>
                        <option value="Ortopedia">Ortopedia</option>
                        <option value="Oftalmología">Oftalmología</option>
                        <option value="Psicología">Psicología</option>
                        <option value="Otorrinolaringología">Otorrinolaringología</option>
                        <option value="Urología">Urología</option>
                        <option value="Gastroenterología">Gastroenterología</option>
                        <option value="Endocrinología">Endocrinología</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="license_num" class="form-label">Número de Licencia Profesional</label>
                    <input type="text" name="license_num" class="form-control">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" name="btnCrearUsuario" class="btn btn-primary">Registrar Usuario</button>
            </div>
        </form>
    </div>
</div>

<script>
    const rolSelect = document.getElementById('rolSelect');
    const camposProfesional = document.getElementById('camposProfesional');

    rolSelect.addEventListener('change', function () {
        if (this.value === "2") {
            camposProfesional.style.display = "block";
        } else {
            camposProfesional.style.display = "none";
        }
    });
</script>

<?php require('./layout/footer.php'); ?>