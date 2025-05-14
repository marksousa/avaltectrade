<?php

use App\Services\Cep\ViaCepService;
use Illuminate\Support\Facades\Http;

uses(Tests\TestCase::class);

describe('ViaCepService', function () {
    it('busca dados do cep corretamente', function () {
        Http::fake([
            '*' => Http::response([
                'cep' => '12345678',
                'logradouro' => 'Rua Teste'
            ], 200),
        ]);

        $service = new ViaCepService();
        $result = $service->buscarPorCep('12345678');

        expect($result)->toHaveKey('cep', '12345678');
        expect($result)->toHaveKey('logradouro', 'Rua Teste');
    });
}); 