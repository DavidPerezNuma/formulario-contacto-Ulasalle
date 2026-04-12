<?php
namespace Domain\Entities;

class ContactValidator {
    public function isValidEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
public function isValidName(string $name): bool {
        return strlen($name) >= 3;
    }