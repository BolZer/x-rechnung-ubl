<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class AccountingParty
{
    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Party')]
    private ?Party $party = null;

    public function getParty(): ?Party
    {
        return $this->party;
    }

    public function setParty(?Party $party): AccountingParty
    {
        $this->party = $party;
        return $this;
    }
}
