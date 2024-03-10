<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests\Traits;

use Bolzer\XRechnungUbl\XRechnung3\Validator;

trait SchemaValidatorTrait
{
    public function validateXmlAgainstSchema(string $xml): void
    {
        $validator = new Validator();

        $errors = $validator->validateAgainstXsdSchema($xml);

        self::assertNull($errors, $errors ?? '');
    }
}
