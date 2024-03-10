<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class AllowanceCharge
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ChargeIndicator')]
    private ?string $chargeIndicator = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AllowanceChargeReasonCode')]
    private ?string $allowanceChargeReasonCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AllowanceChargeReason')]
    private ?string $allowanceChargeReason = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('MultiplierFactorNumeric')]
    private ?string $multiplierFactorNumeric = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Amount')]
    private ?Amount $amount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('BaseAmount')]
    private ?Amount $baseAmount = null;

    #[Type(TaxCategory::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxCategory')]
    private ?TaxCategory $taxCategory = null;

    public function getChargeIndicator(): ?string
    {
        return $this->chargeIndicator;
    }

    public function setChargeIndicator(?string $chargeIndicator): AllowanceCharge
    {
        $this->chargeIndicator = $chargeIndicator;
        return $this;
    }

    public function getAllowanceChargeReasonCode(): ?string
    {
        return $this->allowanceChargeReasonCode;
    }

    public function setAllowanceChargeReasonCode(?string $allowanceChargeReasonCode): AllowanceCharge
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;
        return $this;
    }

    public function getAllowanceChargeReason(): ?string
    {
        return $this->allowanceChargeReason;
    }

    public function setAllowanceChargeReason(?string $allowanceChargeReason): AllowanceCharge
    {
        $this->allowanceChargeReason = $allowanceChargeReason;
        return $this;
    }

    public function getMultiplierFactorNumeric(): ?string
    {
        return $this->multiplierFactorNumeric;
    }

    public function setMultiplierFactorNumeric(?string $multiplierFactorNumeric): AllowanceCharge
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
        return $this;
    }

    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    public function setAmount(?Amount $amount): AllowanceCharge
    {
        $this->amount = $amount;
        return $this;
    }

    public function getBaseAmount(): ?Amount
    {
        return $this->baseAmount;
    }

    public function setBaseAmount(?Amount $baseAmount): AllowanceCharge
    {
        $this->baseAmount = $baseAmount;
        return $this;
    }

    public function getTaxCategory(): ?TaxCategory
    {
        return $this->taxCategory;
    }

    public function setTaxCategory(?TaxCategory $taxCategory): AllowanceCharge
    {
        $this->taxCategory = $taxCategory;
        return $this;
    }
}
