<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Services\Cep\CepLookupInterface;
use App\Services\Cep\CepValidator;

class CepController extends Controller
{
    protected $cepService;

    public function __construct(CepLookupInterface $cepService)
    {
        $this->cepService = $cepService;
    }

    public function index($cep)
    {
        if (!CepValidator::validar($cep)) {
            return Inertia::render('Cep/Index', [
                'cepData' => [
                    'erro' => true,
                    'mensagem' => 'CEP inválido. Informe apenas números e 8 dígitos.'
                ]
            ]);
        }

        $data = $this->cepService->buscarPorCep($cep);

        return Inertia::render('Cep/Index', [
            'cepData' => $data
        ]);
    }
}
