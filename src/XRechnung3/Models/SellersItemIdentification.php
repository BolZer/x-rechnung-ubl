<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class SellersItemIdentification
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?Id $id = null;

    public function getId(): ?Id
    {
        return $this->id;
    }

    public function setId(?Id $id): SellersItemIdentification
    {
        $this->id = $id;
        return $this;
    }
}
