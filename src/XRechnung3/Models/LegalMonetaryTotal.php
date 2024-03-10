<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class LegalMonetaryTotal
{
    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('LineExtensionAmount')]
    private ?Amount $lineExtensionAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxExclusiveAmount')]
    private ?Amount $taxExclusiveAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxInclusiveAmount')]
    private ?Amount $taxInclusiveAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('AllowanceTotalAmount')]
    private ?Amount $allowanceTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ChargeTotalAmount')]
    private ?Amount $chargeTotalAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PrepaidAmount')]
    private ?Amount $prepaidAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PayableRoundingAmount')]
    private ?Amount $payableRoundingAmount = null;

    #[Type(Amount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PayableAmount')]
    private ?Amount $payableAmount = null;

    public function getLineExtensionAmount(): ?Amount
    {
        return $this->lineExtensionAmount;
    }

    public function setLineExtensionAmount(?Amount $lineExtensionAmount): LegalMonetaryTotal
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    public function getTaxExclusiveAmount(): ?Amount
    {
        return $this->taxExclusiveAmount;
    }

    public function setTaxExclusiveAmount(?Amount $taxExclusiveAmount): LegalMonetaryTotal
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        return $this;
    }

    public function getTaxInclusiveAmount(): ?Amount
    {
        return $this->taxInclusiveAmount;
    }

    public function setTaxInclusiveAmount(?Amount $taxInclusiveAmount): LegalMonetaryTotal
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    public function getAllowanceTotalAmount(): ?Amount
    {
        return $this->allowanceTotalAmount;
    }

    public function setAllowanceTotalAmount(?Amount $allowanceTotalAmount): LegalMonetaryTotal
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;
        return $this;
    }

    public function getChargeTotalAmount(): ?Amount
    {
        return $this->chargeTotalAmount;
    }

    public function setChargeTotalAmount(?Amount $chargeTotalAmount): LegalMonetaryTotal
    {
        $this->chargeTotalAmount = $chargeTotalAmount;
        return $this;
    }

    public function getPrepaidAmount(): ?Amount
    {
        return $this->prepaidAmount;
    }

    public function setPrepaidAmount(?Amount $prepaidAmount): LegalMonetaryTotal
    {
        $this->prepaidAmount = $prepaidAmount;
        return $this;
    }

    public function getPayableRoundingAmount(): ?Amount
    {
        return $this->payableRoundingAmount;
    }

    public function setPayableRoundingAmount(?Amount $payableRoundingAmount): LegalMonetaryTotal
    {
        $this->payableRoundingAmount = $payableRoundingAmount;
        return $this;
    }

    public function getPayableAmount(): ?Amount
    {
        return $this->payableAmount;
    }

    public function setPayableAmount(?Amount $payableAmount): LegalMonetaryTotal
    {
        $this->payableAmount = $payableAmount;
        return $this;
    }
}
