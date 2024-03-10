<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class AddressLine
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Line')]
    private ?string $line = null;

    public function getLine(): ?string
    {
        return $this->line;
    }

    public function setLine(?string $line): AddressLine
    {
        $this->line = $line;
        return $this;
    }
}
