<?php
// public/admin.php

require_once '/var/www/src/application/AdminService.php';

$mensajes    = [];
$dbError     = false;

try {
    require_once '/var/www/src/infrastructure/config/db.php';
    $service  = new AdminService($conn);
    $mensajes = $service->obtenerMensajes();
} catch (Throwable $e) {
    $dbError = true;
}

require_once '/var/www/src/presentation/views/admin.php';
