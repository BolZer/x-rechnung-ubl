<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class OrderReference
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?string $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('SalesOrderID')]
    private ?string $salesOrderId = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): OrderReference
    {
        $this->id = $id;
        return $this;
    }

    public function getSalesOrderId(): ?string
    {
        return $this->salesOrderId;
    }

    public function setSalesOrderId(?string $salesOrderId): OrderReference
    {
        $this->salesOrderId = $salesOrderId;
        return $this;
    }
}
