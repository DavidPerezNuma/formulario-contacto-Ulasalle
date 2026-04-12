
<?php
declare(strict_types=1);

// src/application/ContactFormService.php

/**
 * Servicio de aplicación encargado de procesar
 * los datos del formulario de contacto.
 *
 * No maneja $_POST ni headers
 * Solo lógica del dominio
 */

require_once __DIR__ . '/../domain/entities/ContactMessage.php';
require_once __DIR__ . '/../infrastructure/persistence/MySQLContactRepository.php';

class ContactFormService
{
    /**
     * Repositorio donde se guardan los mensajes
     */
    private MySQLContactRepository $repository;

    /**
     * Inyección de dependencias
     * (permite cambiar implementación en el futuro)
     */
    public function __construct(MySQLContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Procesa los datos enviados desde el formulario
     *
     * @param array $data Datos del formulario ($_POST)
     * @return bool true si se guardó correctamente
     */
    public function procesarFormulario(array $data): bool
    {
        // Validación básica de campos obligatorios
        if (
            empty($data['nombre']) ||
            empty($data['correo']) ||
            empty($data['mensaje'])
        ) {
            return false;
        }

        // Validación de correo electrónico
        if (!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Crear entidad del dominio
        $mensaje = new ContactMessage(
            trim($data['nombre']),
            trim($data['correo']),
            trim($data['mensaje'])
        );

        // Guardar mensaje usando el repositorio
        return $this->repository->guardar($mensaje);
    }

    /**
     * Obtiene todos los mensajes almacenados
     *
     * @return array
     */
    public function obtenerMensajes(): array
    {
        return $this->repository->listar();
    }
}
