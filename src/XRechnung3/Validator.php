<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

final class Validator
{
    public function validateAgainstXsd(string $xml, string $schemaFile): ?string
    {
        $domDoc = new \DOMDocument();
        $domDoc->loadXML($xml);

        try {
            libxml_use_internal_errors(true);
            libxml_clear_errors();

            if ($domDoc->schemaValidate($schemaFile)) {
                return null;
            }

            return implode("\n", array_column(libxml_get_errors(), 'message'));
        } finally {
            libxml_use_internal_errors(false);
            libxml_clear_errors();
        }
    }
}
