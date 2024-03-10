<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

abstract class AbstractDocumentLine
{
    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?Id $endpointId = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Note')]
    private ?string $note = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('LineExtensionAmount')]
    private ?Amount $lineExtensionAmount = null;

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('InvoicePeriod')]
    private ?Period $invoicePeriod = null;

    #[Type(OrderLineReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OrderLineReference')]
    private ?OrderLineReference $orderLineReference = null;

    /** @var AllowanceCharge[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\AllowanceCharge>')]
    #[SerializedName('AllowanceCharge')]
    #[XmlList(entry: 'AllowanceCharge', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $allowanceCharge = null;

    /** @var Item[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\Item>')]
    #[SerializedName('Item')]
    #[XmlList(entry: 'Item', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $item = null;

    #[Type(Price::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Price')]
    private ?Price $price = null;

    public function getEndpointId(): ?Id
    {
        return $this->endpointId;
    }

    public function setEndpointId(?Id $endpointId): AbstractDocumentLine
    {
        $this->endpointId = $endpointId;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): AbstractDocumentLine
    {
        $this->note = $note;
        return $this;
    }

    public function getLineExtensionAmount(): ?Amount
    {
        return $this->lineExtensionAmount;
    }

    public function setLineExtensionAmount(?Amount $lineExtensionAmount): AbstractDocumentLine
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    public function getInvoicePeriod(): ?Period
    {
        return $this->invoicePeriod;
    }

    public function setInvoicePeriod(?Period $invoicePeriod): AbstractDocumentLine
    {
        $this->invoicePeriod = $invoicePeriod;
        return $this;
    }

    public function getOrderLineReference(): ?OrderLineReference
    {
        return $this->orderLineReference;
    }

    public function setOrderLineReference(?OrderLineReference $orderLineReference): AbstractDocumentLine
    {
        $this->orderLineReference = $orderLineReference;
        return $this;
    }

    /** @return AllowanceCharge[]|null */
    public function getAllowanceCharge(): ?array
    {
        return $this->allowanceCharge;
    }

    /** @param AllowanceCharge[]|null $allowanceCharge */
    public function setAllowanceCharge(?array $allowanceCharge): AbstractDocumentLine
    {
        $this->allowanceCharge = $allowanceCharge;
        return $this;
    }

    /** @return Item[]|null */
    public function getItem(): ?array
    {
        return $this->item;
    }

    /** @param Item[]|null $item */
    public function setItem(?array $item): AbstractDocumentLine
    {
        $this->item = $item;
        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): AbstractDocumentLine
    {
        $this->price = $price;
        return $this;
    }
}
