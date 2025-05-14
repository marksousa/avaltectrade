<?php

namespace App\Services\Cep;

interface CepLookupInterface {
    public function buscarPorCep(string $cep): array;
} 