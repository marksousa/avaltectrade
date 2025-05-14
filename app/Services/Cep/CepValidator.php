<?php

namespace App\Services\Cep;

class CepValidator {
    public static function validar(string $cep): bool {
        return preg_match('/^\d{8}$/', $cep);
    }
} 