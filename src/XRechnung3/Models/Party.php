<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

final class Party
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('EndpointID')]
    private ?Id $endpointId = null;

    #[Type(Identification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyIdentification')]
    private ?Identification $partyIdentification = null;

    #[Type(PartyName::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyName')]
    private ?PartyName $partyName = null;

    #[Type(Address::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PostalAddress')]
    private ?Address $postalAddress = null;

    /** @var PartyTaxScheme[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\PartyTaxScheme>')]
    #[SerializedName('PartyTaxScheme')]
    #[XmlList(entry: 'PartyTaxScheme', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $partyTaxScheme = null;

    #[Type(PartyLegalEntity::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PartyLegalEntity')]
    private ?PartyLegalEntity $partyLegalEntity;

    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Contact')]
    private ?Contact $contact;

    public function getEndpointId(): ?Id
    {
        return $this->endpointId;
    }

    public function setEndpointId(?Id $endpointId): Party
    {
        $this->endpointId = $endpointId;
        return $this;
    }

    public function getPartyIdentification(): ?Identification
    {
        return $this->partyIdentification;
    }

    public function setPartyIdentification(?Identification $partyIdentification): Party
    {
        $this->partyIdentification = $partyIdentification;
        return $this;
    }

    public function getPartyName(): ?PartyName
    {
        return $this->partyName;
    }

    public function setPartyName(?PartyName $partyName): Party
    {
        $this->partyName = $partyName;
        return $this;
    }

    public function getPostalAddress(): ?Address
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(?Address $postalAddress): Party
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    /** @return PartyTaxScheme[]|null */
    public function getPartyTaxScheme(): ?array
    {
        return $this->partyTaxScheme;
    }

    /** @param PartyTaxScheme[]|null $partyTaxScheme */
    public function setPartyTaxScheme(?array $partyTaxScheme): Party
    {
        $this->partyTaxScheme = $partyTaxScheme;
        return $this;
    }

    public function getPartyLegalEntity(): ?PartyLegalEntity
    {
        return $this->partyLegalEntity;
    }

    public function setPartyLegalEntity(?PartyLegalEntity $partyLegalEntity): Party
    {
        $this->partyLegalEntity = $partyLegalEntity;
        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): Party
    {
        $this->contact = $contact;
        return $this;
    }
}
