<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

#[AccessorOrder(order: 'custom', custom: [
    'endpointId',
    'note',
    'invoicedQuantity',
    'lineExtensionAmount',
    'invoicePeriod',
    'orderLineReference',
    'allowanceCharge',
    'item',
    'price',
])]
final class InvoiceLine extends AbstractDocumentLine
{
    #[Type(Quantity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InvoicedQuantity')]
    private ?Quantity $invoicedQuantity = null;

    public function getInvoicedQuantity(): ?Quantity
    {
        return $this->invoicedQuantity;
    }

    public function setInvoicedQuantity(?Quantity $invoicedQuantity): InvoiceLine
    {
        $this->invoicedQuantity = $invoicedQuantity;
        return $this;
    }
}
