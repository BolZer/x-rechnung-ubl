<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class Item
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Description')]
    private ?string $description = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Name')]
    private ?string $name = null;

    #[Type(SellersItemIdentification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('SellersItemIdentification')]
    private ?SellersItemIdentification $sellersItemIdentification = null;

    #[Type(CommodityClassification::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('CommodityClassification')]
    private ?CommodityClassification $commodityClassification = null;

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ClassifiedTaxCategory')]
    private ?TaxCategory $classifiedTaxCategory = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    public function getSellersItemIdentification(): ?SellersItemIdentification
    {
        return $this->sellersItemIdentification;
    }

    public function setSellersItemIdentification(?SellersItemIdentification $sellersItemIdentification): Item
    {
        $this->sellersItemIdentification = $sellersItemIdentification;
        return $this;
    }

    public function getCommodityClassification(): ?CommodityClassification
    {
        return $this->commodityClassification;
    }

    public function setCommodityClassification(?CommodityClassification $commodityClassification): Item
    {
        $this->commodityClassification = $commodityClassification;
        return $this;
    }

    public function getClassifiedTaxCategory(): ?TaxCategory
    {
        return $this->classifiedTaxCategory;
    }

    public function setClassifiedTaxCategory(?TaxCategory $classifiedTaxCategory): Item
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;
        return $this;
    }
}
