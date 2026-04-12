
<?php
declare(strict_types=1);

// public/procesar_contacto.php

/**
 * Controlador HTTP del formulario de contacto
 * Maneja $_POST
 * Maneja redirecciones
 * Usa el servicio de aplicación
 */

// Configuración de la base de datos
require_once __DIR__ . '/../src/infrastructure/config/db.php';

// Dependencias
require_once __DIR__ . '/../src/domain/entities/ContactMessage.php';
require_once __DIR__ . '/../src/infrastructure/persistence/MySQLContactRepository.php';
require_once __DIR__ . '/../src/application/ContactFormService.php';

//Bloquear accesos que no sean POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contacto.php');
    exit;
}

// Crear repositorio
$repository = new MySQLContactRepository($conn);

// Crear servicio
$service = new ContactFormService($repository);

// Procesar formulario
if ($service->procesarFormulario($_POST)) {
    // Exito
    header('Location: /contacto.php?enviado=1');
} else {
    // Error
    header('Location: /contacto.php?error=1');
}

exit;
