<?php
// src/infrastructure/config/db.php

$host = 'lasalle_db';  // nombre del servicio en docker-compose
$user = 'user';        // definido en docker-compose.yml
$password = 'password';
$database = 'contacto_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
