<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class PartyLegalEntity
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('RegistrationName')]
    private ?string $registrationName = null;

    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CompanyID')]
    private ?Id $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CompanyLegalForm')]
    private ?string $companyLegalForm = null;

    public function getRegistrationName(): ?string
    {
        return $this->registrationName;
    }

    public function setRegistrationName(?string $registrationName): PartyLegalEntity
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    public function getId(): ?Id
    {
        return $this->id;
    }

    public function setId(?Id $id): PartyLegalEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getCompanyLegalForm(): ?string
    {
        return $this->companyLegalForm;
    }

    public function setCompanyLegalForm(?string $companyLegalForm): PartyLegalEntity
    {
        $this->companyLegalForm = $companyLegalForm;
        return $this;
    }
}
