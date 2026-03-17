<?php
// src/domain/entities/ContactMessage.php

class ContactMessage {
    public string $nombre;
    public string $correo;
    public string $mensaje;
    public ?int $id;
    public ?string $fecha;

    public function __construct(string $nombre, string $correo, string $mensaje, ?int $id = null, ?string $fecha = null) {
        $this->nombre  = $nombre;
        $this->correo  = $correo;
        $this->mensaje = $mensaje;
        $this->id      = $id;
        $this->fecha   = $fecha;
    }
}
