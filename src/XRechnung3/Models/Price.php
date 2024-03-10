<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Price
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PriceAmount')]
    private ?Amount $priceAmount = null;

    #[Type(Quantity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('BaseQuantity')]
    private ?Quantity $baseQuantity = null;

    public function getPriceAmount(): ?Amount
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(?Amount $priceAmount): Price
    {
        $this->priceAmount = $priceAmount;
        return $this;
    }

    public function getBaseQuantity(): ?Quantity
    {
        return $this->baseQuantity;
    }

    public function setBaseQuantity(?Quantity $baseQuantity): Price
    {
        $this->baseQuantity = $baseQuantity;
        return $this;
    }
}
