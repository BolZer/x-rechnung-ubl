<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final class Reader
{
    private function __construct(
        private readonly SerializerInterface $serializer,
    ) {}

    /**
     * @template T of UBLAbstractDocument
     * @param class-string<T> $targetClass
     * @return T
     */
    public function transformXmlToUblDocument(string $xml, string $targetClass): mixed
    {
        return $this->serializer->deserialize($xml, $targetClass, 'xml');
    }

    public static function create(): Reader
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->build()
        ;
        return new self($serializer);
    }
}
