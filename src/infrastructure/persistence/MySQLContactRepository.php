<?php
// src/infrastructure/persistence/MySQLContactRepository.php

require_once __DIR__ . '/../../domain/repositories/IContactRepository.php';
require_once __DIR__ . '/../../domain/entities/ContactMessage.php';

class MySQLContactRepository implements IContactRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function guardar(ContactMessage $mensaje): bool {
        $stmt = $this->conn->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $mensaje->nombre, $mensaje->correo, $mensaje->mensaje);
        return $stmt->execute();
    }

    public function listar(): array {
        $result = $this->conn->query("SELECT id, nombre, correo, mensaje, fecha FROM mensajes ORDER BY fecha DESC");
        $mensajes = [];

        while ($row = $result->fetch_assoc()) {
            $mensajes[] = new ContactMessage($row['nombre'], $row['correo'], $row['mensaje'], (int)$row['id'], $row['fecha']);
        }

        return $mensajes;
    }
}
