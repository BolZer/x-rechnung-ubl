<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests\Unit\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Builder;
use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLCredit;
use Bolzer\XRechnungUbl\XRechnung3\Reader;

test(
    'Reader parses the provided xml example accordingly and the resulting xml is identical to the provided',
    function (string $ublDocumentClass, string $pathToXmlExample) {
        $xml = file_get_contents($pathToXmlExample);
        $xml = $this->removeXmlMutates($xml);
        $xml = $this->reformatXml($xml);

        $ublInvoice = Reader::create()->transformXmlToUblDocument($xml, $ublDocumentClass);

        $xmlFromUblInvoice = Builder::create()->transformUblDocumentToXml($ublInvoice);

        $formattedXmlFromUblInvoice = $this->reformatXml($xmlFromUblInvoice);

        $this->assertSame($xml, $formattedXmlFromUblInvoice);
    }
)->with([
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-1-test-493-identity.xml',
    ],
]);
