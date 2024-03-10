<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class DocumentReference
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?string $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DocumentDescription')]
    private ?string $documentDescription = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): DocumentReference
    {
        $this->id = $id;
        return $this;
    }

    public function getDocumentDescription(): ?string
    {
        return $this->documentDescription;
    }

    public function setDocumentDescription(?string $documentDescription): DocumentReference
    {
        $this->documentDescription = $documentDescription;
        return $this;
    }
}
