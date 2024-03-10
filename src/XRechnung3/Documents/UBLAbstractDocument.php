<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Documents;

use Bolzer\XRechnungUbl\XRechnung3\Contracts\UBLDocument;
use Bolzer\XRechnungUbl\XRechnung3\Models\AccountingParty;
use Bolzer\XRechnungUbl\XRechnung3\Models\AllowanceCharge;
use Bolzer\XRechnungUbl\XRechnung3\Models\Delivery;
use Bolzer\XRechnungUbl\XRechnung3\Models\DocumentReference;
use Bolzer\XRechnungUbl\XRechnung3\Models\LegalMonetaryTotal;
use Bolzer\XRechnungUbl\XRechnung3\Models\OrderReference;
use Bolzer\XRechnungUbl\XRechnung3\Models\Party;
use Bolzer\XRechnungUbl\XRechnung3\Models\PaymentMeans;
use Bolzer\XRechnungUbl\XRechnung3\Models\PaymentTerms;
use Bolzer\XRechnungUbl\XRechnung3\Models\Period;
use Bolzer\XRechnungUbl\XRechnung3\Models\TaxTotal;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

abstract class UBLAbstractDocument implements UBLDocument
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CustomizationID')]
    private ?string $customizationId = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ProfileID')]
    private ?string $profileId = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('ID')]
    private ?string $id = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('IssueDate')]
    private ?string $issueDate = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('Note')]
    private ?string $note = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DocumentCurrencyCode')]
    private ?string $documentCurrencyCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('BuyerReference')]
    private ?string $buyerReference = null;

    #[Type(Period::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('InvoicePeriod')]
    private ?Period $invoicePeriod = null;

    #[Type(OrderReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OrderReference')]
    private ?OrderReference $orderReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('OriginatorDocumentReference')]
    private ?DocumentReference $originatorDocumentReference = null;

    #[Type(AccountingParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AccountingSupplierParty')]
    private ?AccountingParty $accountingSupplierParty = null;

    #[Type(AccountingParty::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AccountingCustomerParty')]
    private ?AccountingParty $accountingCustomerParty = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PayeeParty')]
    private ?Party $payeeParty = null;

    #[Type(Party::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('TaxRepresentativeParty')]
    private ?Party $taxRepresentativeParty = null;

    #[Type(Delivery::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('Delivery')]
    private ?Delivery $delivery = null;

    #[Type(PaymentMeans::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PaymentMeans')]
    private ?PaymentMeans $paymentMeans = null;

    #[Type(PaymentTerms::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PaymentTerms')]
    private ?PaymentTerms $paymentTerms = null;

    #[Type(AllowanceCharge::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AllowanceCharge')]
    private ?AllowanceCharge $allowanceCharge = null;

    /** @var TaxTotal[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\TaxTotal>')]
    #[SerializedName('TaxTotal')]
    #[XmlList(entry: 'TaxTotal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $taxTotal = null;

    #[Type(LegalMonetaryTotal::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('LegalMonetaryTotal')]
    private ?LegalMonetaryTotal $legalMonetaryTotal = null;

    public function getCustomizationId(): ?string
    {
        return $this->customizationId;
    }

    public function setCustomizationId(?string $customizationId): UBLAbstractDocument
    {
        $this->customizationId = $customizationId;
        return $this;
    }

    public function getProfileId(): ?string
    {
        return $this->profileId;
    }

    public function setProfileId(?string $profileId): UBLAbstractDocument
    {
        $this->profileId = $profileId;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): UBLAbstractDocument
    {
        $this->id = $id;
        return $this;
    }

    public function getIssueDate(): ?string
    {
        return $this->issueDate;
    }

    public function setIssueDate(?string $issueDate): UBLAbstractDocument
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): UBLAbstractDocument
    {
        $this->note = $note;
        return $this;
    }

    public function getDocumentCurrencyCode(): ?string
    {
        return $this->documentCurrencyCode;
    }

    public function setDocumentCurrencyCode(?string $documentCurrencyCode): UBLAbstractDocument
    {
        $this->documentCurrencyCode = $documentCurrencyCode;
        return $this;
    }

    public function getBuyerReference(): ?string
    {
        return $this->buyerReference;
    }

    public function setBuyerReference(?string $buyerReference): UBLAbstractDocument
    {
        $this->buyerReference = $buyerReference;
        return $this;
    }

    public function getInvoicePeriod(): ?Period
    {
        return $this->invoicePeriod;
    }

    public function setInvoicePeriod(?Period $invoicePeriod): UBLAbstractDocument
    {
        $this->invoicePeriod = $invoicePeriod;
        return $this;
    }

    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    public function setOrderReference(?OrderReference $orderReference): UBLAbstractDocument
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    public function getOriginatorDocumentReference(): ?DocumentReference
    {
        return $this->originatorDocumentReference;
    }

    public function setOriginatorDocumentReference(?DocumentReference $originatorDocumentReference): UBLAbstractDocument
    {
        $this->originatorDocumentReference = $originatorDocumentReference;
        return $this;
    }

    public function getAccountingSupplierParty(): ?AccountingParty
    {
        return $this->accountingSupplierParty;
    }

    public function setAccountingSupplierParty(?AccountingParty $accountingSupplierParty): UBLAbstractDocument
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
        return $this;
    }

    public function getAccountingCustomerParty(): ?AccountingParty
    {
        return $this->accountingCustomerParty;
    }

    public function setAccountingCustomerParty(?AccountingParty $accountingCustomerParty): UBLAbstractDocument
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }

    public function getPayeeParty(): ?Party
    {
        return $this->payeeParty;
    }

    public function setPayeeParty(?Party $payeeParty): UBLAbstractDocument
    {
        $this->payeeParty = $payeeParty;
        return $this;
    }

    public function getTaxRepresentativeParty(): ?Party
    {
        return $this->taxRepresentativeParty;
    }

    public function setTaxRepresentativeParty(?Party $taxRepresentativeParty): UBLAbstractDocument
    {
        $this->taxRepresentativeParty = $taxRepresentativeParty;
        return $this;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function setDelivery(?Delivery $delivery): UBLAbstractDocument
    {
        $this->delivery = $delivery;
        return $this;
    }

    public function getPaymentMeans(): ?PaymentMeans
    {
        return $this->paymentMeans;
    }

    public function setPaymentMeans(?PaymentMeans $paymentMeans): UBLAbstractDocument
    {
        $this->paymentMeans = $paymentMeans;
        return $this;
    }

    public function getPaymentTerms(): ?PaymentTerms
    {
        return $this->paymentTerms;
    }

    public function setPaymentTerms(?PaymentTerms $paymentTerms): UBLAbstractDocument
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }

    public function getAllowanceCharge(): ?AllowanceCharge
    {
        return $this->allowanceCharge;
    }

    public function setAllowanceCharge(?AllowanceCharge $allowanceCharge): UBLAbstractDocument
    {
        $this->allowanceCharge = $allowanceCharge;
        return $this;
    }

    /** @return TaxTotal[]|null */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /** @param TaxTotal[]|null $taxTotal */
    public function setTaxTotal(?array $taxTotal): UBLAbstractDocument
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal): UBLAbstractDocument
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
        return $this;
    }
}
