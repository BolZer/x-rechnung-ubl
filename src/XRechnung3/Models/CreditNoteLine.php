<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

#[AccessorOrder(order: 'custom', custom: [
    'id',
    'note',
    'creditedQuantity',
    'lineExtensionAmount',
    'invoicePeriod',
    'orderLineReference',
    'allowanceCharge',
    'item',
    'price',
])]
final class CreditNoteLine extends AbstractDocumentLine
{
    #[Type(Quantity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CreditedQuantity')]
    private ?Quantity $creditedQuantity = null;

    public function getCreditedQuantity(): ?Quantity
    {
        return $this->creditedQuantity;
    }

    public function setCreditedQuantity(?Quantity $creditedQuantity): CreditNoteLine
    {
        $this->creditedQuantity = $creditedQuantity;
        return $this;
    }
}
