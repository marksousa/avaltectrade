<?php

use App\Services\Cep\CepValidator;

describe('CepValidator', function () {
    it('valida ceps válidos', function () {
        expect(CepValidator::validar('12345678'))->toBeTrue();
        expect(CepValidator::validar('87654321'))->toBeTrue();
    });

    it('rejeita ceps inválidos', function () {
        expect(CepValidator::validar('1234567'))->toBeFalse();      // 7 dígitos
        expect(CepValidator::validar('123456789'))->toBeFalse();    // 9 dígitos
        expect(CepValidator::validar('abcdefgh'))->toBeFalse();     // letras
        expect(CepValidator::validar('1234-567'))->toBeFalse();     // com traço
    });
}); 