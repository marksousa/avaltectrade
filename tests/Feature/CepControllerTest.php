<?php

use Illuminate\Support\Facades\Http;
use Inertia\Testing\AssertableInertia as Assert;

it('retorna erro para cep inválido', function () {
    $response = $this->get('/consulta-cep/1234');
    $response->assertInertia(fn (Assert $page) =>
        $page->component('Cep/Index')
             ->where('cepData.erro', true)
             ->where('cepData.mensagem', 'CEP inválido. Informe apenas números e 8 dígitos.')
    );
});

it('retorna dados para cep válido', function () {
    Http::fake([
        '*' => Http::response([
            'cep' => '12345678',
            'logradouro' => 'Rua Teste'
        ], 200),
    ]);
    $response = $this->get('/consulta-cep/12345678');
    $response->assertInertia(fn (Assert $page) =>
        $page->component('Cep/Index')
             ->where('cepData.cep', '12345678')
             ->where('cepData.logradouro', 'Rua Teste')
    );
}); 