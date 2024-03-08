<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Contracts\UBLDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final class Builder
{
    private function __construct(
        private readonly SerializerInterface $serializer,
    ) {}

    public function transformUblDocumentToXml(UBLDocument $UBLDocument): string
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
