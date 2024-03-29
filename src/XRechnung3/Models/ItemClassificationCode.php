<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class ItemClassificationCode
{
    #[Type('string')]
    #[XmlAttribute]
    #[SerializedName('listID')]
    private ?string $listId = null;

    #[Type('string')]
    #[XmlValue(cdata: false)]
    private ?string $value = null;

    public function getListId(): ?string
    {
        return $this->listId;
    }

    public function setListId(?string $listId): ItemClassificationCode
    {
        $this->listId = $listId;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): ItemClassificationCode
    {
        $this->value = $value;
        return $this;
    }
}
