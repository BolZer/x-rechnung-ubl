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

    #[Type(PostalAddress::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PostalAddress')]
    private ?PostalAddress $postalAddress = null;

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
}
