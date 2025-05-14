<?php

namespace App\Services\Cep;

use Illuminate\Support\Facades\Http;

class ViaCepService implements CepLookupInterface {
    public function buscarPorCep(string $cep): array {
        $response = Http::viacep()->get("{$cep}/json/");
        return $response->json();
    }
} 