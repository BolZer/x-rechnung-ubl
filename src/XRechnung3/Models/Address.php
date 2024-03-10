<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class Address
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

    /** @var AddressLine[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\AddressLine>')]
    #[SerializedName('AddressLine')]
    #[XmlList(entry: 'AddressLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $addressLine = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CountrySubentity')]
    private ?string $countrySubentity = null;

    #[Type(Country::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Country')]
    private ?Country $country = null;

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(?string $streetName): Address
    {
        $this->streetName = $streetName;
        return $this;
    }

    public function getAdditionalStreetName(): ?string
    {
        return $this->additionalStreetName;
    }

    public function setAdditionalStreetName(?string $additionalStreetName): Address
    {
        $this->additionalStreetName = $additionalStreetName;
        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(?string $cityName): Address
    {
        $this->cityName = $cityName;
        return $this;
    }

    public function getPostalZone(): ?string
    {
        return $this->postalZone;
    }

    public function setPostalZone(?string $postalZone): Address
    {
        $this->postalZone = $postalZone;
        return $this;
    }

    /** @return AddressLine[]|null */
    public function getAddressLine(): ?array
    {
        return $this->addressLine;
    }

    /** @param AddressLine[]|null $addressLine */
    public function setAddressLine(?array $addressLine): Address
    {
        $this->addressLine = $addressLine;
        return $this;
    }

    public function getCountrySubentity(): ?string
    {
        return $this->countrySubentity;
    }

    public function setCountrySubentity(?string $countrySubentity): Address
    {
        $this->countrySubentity = $countrySubentity;
        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): Address
    {
        $this->country = $country;
        return $this;
    }
}
