<?php
// src/domain/repositories/IContactRepository.php

interface IContactRepository {
    /**
     * Guarda un mensaje de contacto en el repositorio.
     */
    public function guardar(ContactMessage $mensaje): bool;

    /**
     * Lista todos los mensajes de contacto.
     * @return ContactMessage[]
     */
    public function listar(): array;
}
