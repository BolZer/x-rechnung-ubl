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

    #[Type('int')]
    #[XmlValue(cdata: false)]
    public ?int $value = null;
}
