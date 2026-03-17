<?php
// src/tests/ContactFormTest.php

require_once __DIR__ . '/../domain/entities/ContactMessage.php';
require_once __DIR__ . '/../infrastructure/persistence/MySQLContactRepository.php';
require_once __DIR__ . '/../infrastructure/config/db.php';
require_once __DIR__ . '/../application/ContactFormService.php';

echo "=== Iniciando pruebas del formulario de contacto ===\n";

// 1. Crear instancia del servicio
$service = new ContactFormService($conn);

// 2. Probar inserción de un mensaje
$testData = [
    'nombre' => 'Prueba Usuario',
    'correo' => 'usuario@ejemplo.com',
    'mensaje' => 'Este es un mensaje de prueba'
];

$result = $service->procesarFormulario($testData);

if ($result) {
    echo "✅ Test de inserción: Mensaje guardado correctamente.\n";
} else {
    echo "❌ Test de inserción: Error al guardar el mensaje.\n";
}

// 3. Probar listado de mensajes
$mensajes = $service->obtenerMensajes();

if (count($mensajes) > 0) {
    echo "✅ Test de listado: Se recuperaron " . count($mensajes) . " mensajes.\n";
    foreach ($mensajes as $msg) {
        echo "- " . $msg->nombre . " | " . $msg->correo . " | " . $msg->mensaje . "\n";
    }
} else {
    echo "❌ Test de listado: No se recuperaron mensajes.\n";
}

echo "=== Fin de pruebas ===\n";
?>