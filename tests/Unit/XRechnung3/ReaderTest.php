<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests\Unit\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Builder;
use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLCredit;
use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLInvoice;
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
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-1-test-494-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-2-test-586-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-2-test-587-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-3-test-655-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-3-test-656-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-4-test-663-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-4-test-664-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-5-test-665-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-5-test-666-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-6-test-667-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-6-test-668-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-7-test-669-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-7-test-670-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-8-test-671-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-8-test-672-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-9-test-673-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-9-test-674-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-10-test-495-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-10-test-496-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-11-test-497-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-11-test-498-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-14-test-499-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-14-test-500-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-15-test-501-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-15-test-502-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-518-code-Z.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-519-code-E.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-520-code-AE.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-521-code-K.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-522-code-G.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-523-code-L.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-95-524-code-M.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-503-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-504-code-Z.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-505-code-E.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-506-code-AE.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-507-code-K.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-507-code-K.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-508-code-G.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-509-code-L.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-102-510-code-M.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-511-code-Z.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-512-code-E.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-513-code-AE.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-514-code-K.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-515-code-G.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-516-code-L.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-negative-test-bt-151-517-code-M.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-br-de-16-test-bt-95-540-code-Z.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r001-675-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r001-676-remove.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r005-677-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r005-678-code-EUR.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r008-679-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r040-allowance-689-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r040-charge-701-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r041-721-identity.xml',
    ],
    [
        'ublDocumentClass' => UBLCredit::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-cn-peppol-en16931-r043-730-code-true.xml',
    ],
    [
        'ublDocumentClass' => UBLInvoice::class,
        'exampleFile' => __DIR__ . '/Examples/ubl-inv-peppol-en16931-r001-348-identity.xml',
    ],
]);
