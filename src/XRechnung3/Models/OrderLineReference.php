<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class OrderLineReference
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('LineID')]
    private ?Id $lineId = null;

    public function getLineId(): ?Id
    {
        return $this->lineId;
    }

    public function setLineId(?Id $lineId): OrderLineReference
    {
        $this->lineId = $lineId;
        return $this;
    }
}
