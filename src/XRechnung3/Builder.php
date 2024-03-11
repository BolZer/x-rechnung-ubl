<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Builder
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    public function transformUblDocumentToXml(UBLAbstractDocument $UBLDocument): string
    {
        return $this->serializer->serialize($UBLDocument, 'xml');
    }

    public static function create(): Builder
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }
}
