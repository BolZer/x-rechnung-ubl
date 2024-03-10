<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Quantity
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('unitCode')]
    private ?string $unitCode = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    private ?string $value = null;

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    public function setUnitCode(?string $unitCode): Quantity
    {
        $this->unitCode = $unitCode;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): Quantity
    {
        $this->value = $value;
        return $this;
    }
}
