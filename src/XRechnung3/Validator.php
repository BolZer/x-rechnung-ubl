<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

final class Validator
{
    public const SCHEMA = __DIR__ . '/Schema/xrechnung-semantic-model.xsd';

    public function validateAgainstXsdSchema(string $xml): ?string
    {
        $domDoc = new \DOMDocument();
        $domDoc->loadXML($xml);

        try {
            libxml_use_internal_errors(true);
            libxml_clear_errors();

            if ($domDoc->schemaValidate(self::SCHEMA)) {
                return null;
            }

            return implode("\n", array_column(libxml_get_errors(), 'message'));
        } finally {
            libxml_use_internal_errors(false);
            libxml_clear_errors();
        }
    }
}
