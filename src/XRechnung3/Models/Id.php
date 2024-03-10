<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Id
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('schemeID')]
    private ?string $schemeID = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    private ?string $value = null;

    public function getSchemeID(): ?string
    {
        return $this->schemeID;
    }

    public function setSchemeID(?string $schemeID): Id
    {
        $this->schemeID = $schemeID;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): Id
    {
        $this->value = $value;
        return $this;
    }
}
