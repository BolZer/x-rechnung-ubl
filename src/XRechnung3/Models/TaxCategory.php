<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TaxCategory
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?Id $id = null;

    #[Type('int')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Percent')]
    private ?int $percent = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxExemptionReason')]
    private ?string $taxExemptionReason = null;

    #[Type(TaxScheme::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxScheme')]
    private ?TaxScheme $taxScheme = null;

    public function getId(): ?Id
    {
        return $this->id;
    }

    public function setId(?Id $id): TaxCategory
    {
        $this->id = $id;
        return $this;
    }

    public function getPercent(): ?int
    {
        return $this->percent;
    }

    public function setPercent(?int $percent): TaxCategory
    {
        $this->percent = $percent;
        return $this;
    }

    public function getTaxExemptionReason(): ?string
    {
        return $this->taxExemptionReason;
    }

    public function setTaxExemptionReason(?string $taxExemptionReason): TaxCategory
    {
        $this->taxExemptionReason = $taxExemptionReason;
        return $this;
    }

    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    public function setTaxScheme(?TaxScheme $taxScheme): TaxCategory
    {
        $this->taxScheme = $taxScheme;
        return $this;
    }
}
