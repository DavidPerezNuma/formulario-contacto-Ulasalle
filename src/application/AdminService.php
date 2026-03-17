<?php
// src/application/AdminService.php

require_once __DIR__ . '/../infrastructure/persistence/MySQLContactRepository.php';

class AdminService {
    private $repository;

    public function __construct($conn) {
        $this->repository = new MySQLContactRepository($conn);
    }

    public function obtenerMensajes(): array {
        return $this->repository->listar();
    }
}
