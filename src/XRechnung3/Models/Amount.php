<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class Amount
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('currencyID')]
    public ?string $currencyID = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    public ?string $value = null;

    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }

    public function setCurrencyID(?string $currencyID): Amount
    {
        $this->currencyID = $currencyID;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): Amount
    {
        $this->value = $value;
        return $this;
    }
}
