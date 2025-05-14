<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class CepController extends Controller
{
    public function index($cep)
    {
        // Validação: apenas números e 8 dígitos
        if (!preg_match('/^\d{8}$/', $cep)) {
            return Inertia::render('Cep/Index', [
                'cepData' => [
                    'erro' => true,
                    'mensagem' => 'CEP inválido. Informe apenas números e 8 dígitos.'
                ]
            ]);
        }

        $response = Http::viacep()->get("https://viacep.com.br/ws/{$cep}/json/");
        $data = $response->json();

        return Inertia::render('Cep/Index', [
            'cepData' => $data
        ]);
    }
}
