<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests\Traits;

use Bolzer\XRechnungUbl\XRechnung3\Validator;

trait ValidatorTrait
{
    public function validateWithKositValidator(string $xml): void
    {
        $validator = new Validator();

        $errors = $validator->validate($xml);

        self::assertNull($errors, $errors ?? '');
    }
}
