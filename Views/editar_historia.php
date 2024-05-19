<?php
    require('alertas.php');
    
session_start();
if (empty($_SESSION['name']) && !empty($_SESSION['last_name'])) {
    header('location: login/login.php');
}

require_once '../Controllers/vetController.php';

$controller = new VetController('http://localhost:4000/api/vet');

if (isset($_GET['history_id'])) {
  $history_id = $_GET['history_id'];
  $info = $controller->getVetById($history_id);

  // Verifica que se hayan obtenido los datos correctamente
  if ($info === null || !isset($info[0]['client_name'])) {
      die('Error: No se pudieron obtener los datos del cliente.');
  }
  $info = $info[0]; // Accede al primer (y único) elemento del array
} else {
  // Redirige al listado si no se proporciona el history_id
  header('Location: inicio.php');
  exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'client_name' => $_POST['client_name'],
        'document_number' => $_POST['document_number'],
        'client_gender' => $_POST['client_gender'],
        'pet_name' => $_POST['pet_name'],
        'pet_breed' => $_POST['pet_breed'],
        'pet_gender' => $_POST['pet_gender'],
        'visit_date' => $_POST['visit_date'],
        'visit_time' => $_POST['visit_time'],
        'temperature' => $_POST['temperature'],
        'weight' => $_POST['weight'],
        'heart_rate' => $_POST['heart_rate'],
        'detail_visit_date' => $_POST['detail_visit_date'],
        'detail_visit_time' => $_POST['detail_visit_time'],
        'observation' => $_POST['observation'],
        'collaborator_name' => $_POST['collaborator_name']
    );

    $controller->updateVet($history_id, $data);
    // Redirige al listado con un mensaje de éxito
    header('Location: inicio.php?message=success');
    exit;
}

//primero se carga el topbar
require('./layout/topbar.php');
//luego se carga el sidebar -->
require('./layout/sidebar.php'); 
?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">EDITAR HISTORIAS CLINICAS</h4>

<!-- formulario para registrar una nueva historia clínica -->
<div class="container mt-5">
    <form action="editar_historia.php?history_id=<?php echo $history_id; ?>" method="post">
        <div class="mb-3">
            <label for="client_name" class="form-label">Nombre del Cliente:</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="<?php echo htmlspecialchars($info['client_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="document_number" class="form-label">Número de Documento:</label>
            <input type="text" class="form-control" id="document_number" name="document_number" value="<?php echo htmlspecialchars($info['document_number']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="client_gender" class="form-label">Género del Cliente:</label>
            <input type="text" class="form-control" id="client_gender" name="client_gender" value="<?php echo htmlspecialchars($info['client_gender']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="pet_name" class="form-label">Nombre de la Mascota:</label>
            <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?php echo htmlspecialchars($info['pet_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="pet_breed" class="form-label">Raza de la Mascota:</label>
            <input type="text" class="form-control" id="pet_breed" name="pet_breed" value="<?php echo htmlspecialchars($info['pet_breed']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="pet_gender" class="form-label">Género de la Mascota:</label>
            <input type="text" class="form-control" id="pet_gender" name="pet_gender" value="<?php echo htmlspecialchars($info['pet_gender']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="visit_date" class="form-label">Fecha de la Visita:</label>
            <input type="date" class="form-control" id="visit_date" name="visit_date" value="<?php echo $info['visit_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="visit_time" class="form-label">Hora de la Visita:</label>
            <input type="time" class="form-control" id="visit_time" name="visit_time" value="<?php echo htmlspecialchars($info['visit_time']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="temperature" class="form-label">Temperatura:</label>
            <input type="number" class="form-control" id="temperature" name="temperature" value="<?php echo htmlspecialchars($info['temperature']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Peso:</label>
            <input type="number" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($info['weight']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="heart_rate" class="form-label">Frecuencia Cardíaca:</label>
            <input type="number" class="form-control" id="heart_rate" name="heart_rate" value="<?php echo htmlspecialchars($info['heart_rate']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="detail_visit_date" class="form-label">Fecha del Detalle:</label>
            <input type="date" class="form-control" id="detail_visit_date" name="detail_visit_date" value="<?php echo $info['detail_visit_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="detail_visit_time" class="form-label">Hora del Detalle:</label>
            <input type="time" class="form-control" id="detail_visit_time" name="detail_visit_time" value="<?php echo htmlspecialchars($info['detail_visit_time']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="observation" class="form-label">Observación:</label>
            <textarea class="form-control" id="observation" name="observation" required><?php echo htmlspecialchars($info['observation']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="collaborator_name" class="form-label">Nombre del Colaborador:</label>
            <input type="text" class="form-control" id="collaborator_name" name="collaborator_name" value="<?php echo htmlspecialchars($info['collaborator_name']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>
