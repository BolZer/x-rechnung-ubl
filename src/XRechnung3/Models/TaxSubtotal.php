<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class TaxSubtotal
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxableAmount')]
    private ?Amount $taxableAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxAmount')]
    private ?Amount $taxAmount = null;

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxCategory')]
    private ?TaxCategory $taxCategory = null;

    public function getTaxableAmount(): ?Amount
    {
        return $this->taxableAmount;
    }

    public function setTaxableAmount(?Amount $taxableAmount): TaxSubtotal
    {
        $this->taxableAmount = $taxableAmount;
        return $this;
    }

    public function getTaxAmount(): ?Amount
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?Amount $taxAmount): TaxSubtotal
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    public function setTaxCategory(?TaxCategory $taxCategory): TaxSubtotal
    {
        $this->taxCategory = $taxCategory;
        return $this;
    }
}
