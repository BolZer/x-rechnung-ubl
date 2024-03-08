<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class PostalAddress
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('StreetName')]
    private ?string $streetName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AdditionalStreetName')]
    private ?string $additionalStreetName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CityName')]
    private ?string $cityName = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PostalZone')]
    private ?string $postalZone = null;

    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\AddressLine>')]
    #[SerializedName('AddressLine')]
    #[XmlList(entry: 'AddressLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $addressLine = null;

    #[Type(Country::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Country')]
    private ?Country $country = null;
}
