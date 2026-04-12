<?php
namespace Domain\Entities;

class ContactValidator {
    public function isValidEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function isValidName(string $name): bool {
        return strlen($name) >= 3;
    }
    public function isMessageEmpty(string $message): bool {
        return !empty(trim($message));
    }
    public function validateAll($name, $email, $message): bool {
        return $this->isValidName($name) && $this->isValidEmail($email) && $this->isMessageEmpty($message);
    }
    public function validateAll($name, $email, $message): bool {
        return $this->isValidName($name) && $this->isValidEmail($email) && $this->isMessageEmpty($message);
    }
}