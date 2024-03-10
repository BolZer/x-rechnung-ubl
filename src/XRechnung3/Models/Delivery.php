<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Delivery
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ActualDeliveryDate')]
    private ?string $endpointId = null;

    #[Type(DeliveryLocation::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('DeliveryLocation')]
    private ?DeliveryLocation $deliveryLocation = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('DeliveryParty')]
    private ?Party $deliveryParty = null;

    public function getEndpointId(): ?string
    {
        return $this->endpointId;
    }

    public function setEndpointId(?string $endpointId): Delivery
    {
        $this->endpointId = $endpointId;
        return $this;
    }

    public function getDeliveryLocation(): ?DeliveryLocation
    {
        return $this->deliveryLocation;
    }

    public function setDeliveryLocation(?DeliveryLocation $deliveryLocation): Delivery
    {
        $this->deliveryLocation = $deliveryLocation;
        return $this;
    }

    public function getDeliveryParty(): ?Party
    {
        return $this->deliveryParty;
    }

    public function setDeliveryParty(?Party $deliveryParty): Delivery
    {
        $this->deliveryParty = $deliveryParty;
        return $this;
    }
}
