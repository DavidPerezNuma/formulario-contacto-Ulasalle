<?php
// src/application/ContactFormService.php

require_once __DIR__ . '/../domain/entities/ContactMessage.php';
require_once __DIR__ . '/../infrastructure/persistence/MySQLContactRepository.php';
require_once __DIR__ . '/../infrastructure/config/db.php';

class ContactFormService {
    private $repository;

    public function __construct($conn) {
        $this->repository = new MySQLContactRepository($conn);
    }

    /**
     * Procesa los datos enviados desde el formulario.
     */
    public function procesarFormulario(array $data): bool {
        // Crear entidad desde los datos recibidos
        $mensaje = new ContactMessage(
            $data['nombre'],
            $data['correo'],
            $data['mensaje']
        );

        // Guardar en el repositorio
        return $this->repository->guardar($mensaje);
    }

    /**
     * Obtiene todos los mensajes guardados.
     */
    public function obtenerMensajes(): array {
        return $this->repository->listar();
    }
}

// --- Punto de entrada cuando se envía el formulario ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = new ContactFormService($conn);

    if ($service->procesarFormulario($_POST)) {
        header('Location: /contacto.php?enviado=1');
    } else {
        header('Location: /contacto.php?error=1');
    }
    exit;
}
?>