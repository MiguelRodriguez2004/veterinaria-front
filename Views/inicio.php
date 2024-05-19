<?php
session_start();
if (empty($_SESSION['name']) && !empty($_SESSION['last_name'])) {
    header('location: login/login.php');
}

// Realizar la solicitud a la API para obtener los datos de las historias clínicas
$base_url = 'http://localhost:4000/api/vet'; // URL base de la API
$response = file_get_contents($base_url); // Realiza la solicitud GET a la API
$data = json_decode($response, true); // Decodifica la respuesta JSON en un array asociativo

require('alertas.php');

//Primero se carga el topbar 
require('./layout/topbar.php');

 //Luego se carga el sidebar
require('./layout/sidebar.php');

?>
<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">LISTAR HISTORIAS CLINICAS</h4>

    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Documento</th>
                <th scope="col">Género Cliente</th>
                <th scope="col">Mascota</th>
                <th scope="col">Raza</th>
                <th scope="col">Género Mascota</th>
                <th scope="col">Fecha Visita</th>
                <th scope="col">Hora Visita</th>
                <th scope="col">Temperatura</th>
                <th scope="col">Peso</th>
                <th scope="col">Frecuencia Cardíaca</th>
                <th scope="col">Fecha Detalle</th>
                <th scope="col">Hora Detalle</th>
                <th scope="col">Observación</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $index => $row) { ?>
                <tr>
                    <th scope="row"><?php echo $index + 1; ?></th>
                    <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                    <td><?php echo $row['document_number']; ?></td>
                    <td><?php echo $row['client_gender']; ?></td>
                    <td><?php echo $row['pet_name']; ?></td>
                    <td><?php echo $row['pet_breed']; ?></td>
                    <td><?php echo $row['pet_gender']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['visit_date'])); ?></td>
                    <td><?php echo $row['visit_time']; ?></td>
                    <td><?php echo $row['temperature']; ?> °C</td>
                    <td><?php echo $row['weight']; ?> kg</td>
                    <td><?php echo $row['heart_rate']; ?> bpm</td>
                    <td><?php echo date('d/m/Y', strtotime($row['detail_visit_date'])); ?></td>
                    <td><?php echo $row['detail_visit_time']; ?></td>
                    <td><?php echo $row['observation']; ?></td>
                    <td><?php echo $row['collaborator_name']; ?></td>
                    <td>
                        <a href="editar_historia.php?history_id=<?php echo $row['history_id']; ?>" class="btn btn-primary">Editar</a> <!-- Botón para editar -->
                        <a href="#" onclick="confirmarEliminacion(<?php echo $row['history_id']; ?>)" class="btn btn-danger">Eliminar</a> <!-- Botón para eliminar -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>
