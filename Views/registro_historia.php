<?php
    
    require('alertas.php');
    
session_start();
if (empty($_SESSION['name']) && !empty($_SESSION['last_name'])) {
    header('location: login/login.php');
}

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $client_name = $_POST["client_name"];
    $document_number = $_POST["document_number"];
    $client_gender = $_POST["client_gender"];
    $pet_name = $_POST["pet_name"];
    $pet_breed = $_POST["pet_breed"];
    $pet_gender = $_POST["pet_gender"];
    $visit_date = $_POST["visit_date"];
    $visit_time = $_POST["visit_time"];
    $temperature = $_POST["temperature"];
    $weight = $_POST["weight"];
    $heart_rate = $_POST["heart_rate"];
    $detail_visit_date = $_POST["detail_visit_date"];
    $detail_visit_time = $_POST["detail_visit_time"];
    $observation = $_POST["observation"];
    $collaborator_name = $_POST["collaborator_name"];

    // Crea un array con los datos a enviar a la API
    $data = array(
        "client_name" => $client_name,
        "document_number" => $document_number,
        "client_gender" => $client_gender,
        "pet_name" => $pet_name,
        "pet_breed" => $pet_breed,
        "pet_gender" => $pet_gender,
        "visit_date" => $visit_date,
        "visit_time" => $visit_time,
        "temperature" => $temperature,
        "weight" => $weight,
        "heart_rate" => $heart_rate,
        "detail_visit_date" => $detail_visit_date,
        "detail_visit_time" => $detail_visit_time,
        "observation" => $observation,
        "collaborator_name" => $collaborator_name
    );

    // Codifica los datos como JSON
    $data_json = json_encode($data);

    // URL de la API
    $api_url = 'http://localhost:4000/api/vet';

    // Configura la solicitud POST
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $data_json
        )
    );

    // Realiza la solicitud POST a la API
    $context = stream_context_create($options);
    $result = file_get_contents($api_url, false, $context);

    // Verifica si la solicitud fue exitosa
    if ($result !== false) {
        // Si la solicitud fue exitosa, muestra una alerta SweetAlert y redirecciona a inicio.php
        echo "<script>
                Swal.fire({
                    title: '¡Registro exitoso!',
                    text: 'La historia clínica se ha registrado correctamente.',
                    icon: 'success'
                }).then((value) => {
                    window.location.href = 'inicio.php';
                });
              </script>";
    } else {
        // Si la solicitud falló, muestra una alerta SweetAlert y redirecciona a inicio.php
        echo "<script>
                Swal.fire({
                    title: '¡Error!',
                    text: 'Hubo un error al registrar la historia clínica.',
                    icon: 'error'
                }).then((value) => {
                    window.location.href = 'inicio.php';
                });
              </script>";
    }
}


// Primero se carga el topbar
require('./layout/topbar.php'); 

// Luego se carga el sidebar
require('./layout/sidebar.php'); 

?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">REGISTRAR HISTORIAS CLINICAS</h4>

<!-- formulario para registrar una nueva historia clínica -->
<div class="container mt-5">
    <form action="registro_historia.php" method="post">
        <div class="mb-3">
            <label for="client_name" class="form-label">Nombre del Cliente:</label>
            <input type="text" class="form-control" id="client_name" name="client_name" required>
        </div>

        <div class="mb-3">
            <label for="document_number" class="form-label">Número de Documento:</label>
            <input type="text" class="form-control" id="document_number" name="document_number" required>
        </div>

        <div class="mb-3">
            <label for="client_gender" class="form-label">Género del Cliente:</label>
            <select class="form-select" id="client_gender" name="client_gender" required>
                <option value="Male">Masculino</option>
                <option value="Female">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="pet_name" class="form-label">Nombre de la Mascota:</label>
            <input type="text" class="form-control" id="pet_name" name="pet_name" required>
        </div>

        <div class="mb-3">
            <label for="pet_breed" class="form-label">Raza de la Mascota:</label>
            <input type="text" class="form-control" id="pet_breed" name="pet_breed" required>
        </div>

        <div class="mb-3">
            <label for="pet_gender" class="form-label">Género de la Mascota:</label>
            <select class="form-select" id="pet_gender" name="pet_gender" required>
                <option value="Male">Masculino</option>
                <option value="Female">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="visit_date" class="form-label">Fecha de la Visita:</label>
            <input type="date" class="form-control" id="visit_date" name="visit_date" required>
        </div>

        <div class="mb-3">
            <label for="visit_time" class="form-label">Hora de la Visita:</label>
            <input type="time" class="form-control" id="visit_time" name="visit_time" required>
        </div>

        <div class="mb-3">
            <label for="temperature" class="form-label">Temperatura:</label>
            <input type="number" class="form-control" id="temperature" name="temperature" required>
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Peso:</label>
            <input type="number" class="form-control" id="weight" name="weight" required>
        </div>

        <div class="mb-3">
            <label for="heart_rate" class="form-label">Frecuencia Cardíaca:</label>
            <input type="number" class="form-control" id="heart_rate" name="heart_rate" required>
        </div>

        <div class="mb-3">
            <label for="detail_visit_date" class="form-label">Fecha del Detalle de Visita:</label>
            <input type="date" class="form-control" id="detail_visit_date" name="detail_visit_date" required>
        </div>

        <div class="mb-3">
            <label for="detail_visit_time" class="form-label">Hora del Detalle de Visita:</label>
            <input type="time" class="form-control" id="detail_visit_time" name="detail_visit_time" required>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observación:</label>
            <textarea class="form-control" id="observation" name="observation" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="collaborator_name" class="form-label">Nombre del Colaborador:</label>
            <input type="text" class="form-control" id="collaborator_name" name="collaborator_name" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Registrar Historia Clínica</button>
    </form>
</div>

</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>
