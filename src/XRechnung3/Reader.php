<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLAbstractDocument;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final readonly class Reader
{
    private function __construct(
        private SerializerInterface $serializer,
    ) {}

    /**
     * @template T of UBLAbstractDocument
     * @throws \RuntimeException
     * @param class-string<T> $targetClass
     * @return T
     */
    public function transformXmlToUblDocument(string $xml, string $targetClass): mixed
    {
        $object = $this->serializer->deserialize($xml, $targetClass, 'xml');

        if (!$object instanceof $targetClass) {
            throw new \RuntimeException(sprintf('Deserialized object is not an instance of %s', $targetClass));
        }

        return $object;
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
