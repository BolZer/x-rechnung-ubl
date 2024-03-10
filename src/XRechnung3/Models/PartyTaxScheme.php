<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class PartyTaxScheme
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CompanyID')]
    private ?string $companyId = null;

    #[Type(TaxScheme::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxScheme')]
    private ?TaxScheme $taxScheme = null;

    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    public function setCompanyId(?string $companyId): PartyTaxScheme
    {
        $this->companyId = $companyId;
        return $this;
    }

    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    public function setTaxScheme(?TaxScheme $taxScheme): PartyTaxScheme
    {
        $this->taxScheme = $taxScheme;
        return $this;
    }
}
