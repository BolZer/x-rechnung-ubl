<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class TaxTotal
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxAmount')]
    private ?Amount $taxAmount = null;

    /** @var TaxSubtotal[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\TaxSubtotal>')]
    #[SerializedName('TaxSubtotal')]
    #[XmlList(entry: 'TaxSubtotal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $taxSubtotal = null;

    public function getTaxAmount(): ?Amount
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?Amount $taxAmount): TaxTotal
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /** @return TaxSubtotal[]|null */
    public function getTaxSubtotal(): ?array
    {
        return $this->taxSubtotal;
    }

    /** @param TaxSubtotal[]|null $taxSubtotal */
    public function setTaxSubtotal(?array $taxSubtotal): TaxTotal
    {
        $this->taxSubtotal = $taxSubtotal;
        return $this;
    }
}
