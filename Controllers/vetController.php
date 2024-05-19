<?php
require_once '../Models/connection.php'; // Importa el archivo de conexión

class VetController {
    private $base_url; // Variable para almacenar la URL base de la API

    public function __construct($base_url) {
        $this->base_url = $base_url;
    }

     // Métodos adicionales según sea necesario para interactuar con la API
    public function getAllVets() {
        $url = $this->base_url;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public function getVetById($history_id) {
        $url = $this->base_url . "/" . $history_id;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }


    public function addVet($data) {
        $url = $this->base_url;
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public function updateVet($history_id, $data) {
        
        // URL de la API para actualizar la historia clínica
        $url = $this->base_url . "/" . $history_id;

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'PUT',
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public function deleteVet($history_id) {
        
        // URL de la API para actualizar la historia clínica
        $url = $this->base_url . "/" . $history_id;

        $options = array(
            'http' => array(
                'method' => 'DELETE',
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

}