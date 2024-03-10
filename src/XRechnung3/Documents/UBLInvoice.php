<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Documents;

use Bolzer\XRechnungUbl\XRechnung3\Models\DocumentReference;
use Bolzer\XRechnungUbl\XRechnung3\Models\InvoiceLine;
use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('Invoice')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2', prefix: '')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', prefix: 'cec')]
#[AccessorOrder(order: 'custom', custom: [
    'customizationId',
    'profileId',
    'id',
    'issueDate',
    'dueDate',
    'invoiceTypeCode',
    'note',
    'taxPointDate',
    'documentCurrencyCode',
    'buyerReference',
    'invoicePeriod',
    'orderReference',
    'originatorDocumentReference',
    'contractDocumentReference',
    'additionalDocumentReference',
    'projectReference',
    'accountingSupplierParty',
    'accountingCustomerParty',
    'accountingCustomerParty',
    'payeeParty',
    'taxRepresentativeParty',
    'delivery',
    'paymentMeans',
    'paymentTerms',
    'allowanceCharge',
    'taxTotal',
    'legalMonetaryTotal',
])]
final class UBLInvoice  extends UBLAbstractDocument
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('DueDate')]
    private ?string $dueDate = null;

    #[Type('int')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('InvoiceTypeCode')]
    private ?int $invoiceTypeCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxPointDate')]
    private ?string $taxPointDate = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ContractDocumentReference')]
    private ?DocumentReference $contractDocumentReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('AdditionalDocumentReference')]
    private ?DocumentReference $additionalDocumentReference = null;

    #[Type(DocumentReference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ProjectReference')]
    private ?DocumentReference $projectReference = null;

    /** @var InvoiceLine[]|null */
    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\InvoiceLine>')]
    #[SerializedName('InvoiceLine')]
    #[XmlList(entry: 'InvoiceLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $invoiceLine = null;

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    public function setDueDate(?string $dueDate): UBLInvoice
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getInvoiceTypeCode(): ?int
    {
        return $this->invoiceTypeCode;
    }

    public function setInvoiceTypeCode(?int $invoiceTypeCode): UBLInvoice
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
        return $this;
    }

    public function getTaxPointDate(): ?string
    {
        return $this->taxPointDate;
    }

    public function setTaxPointDate(?string $taxPointDate): UBLInvoice
    {
        $this->taxPointDate = $taxPointDate;
        return $this;
    }

    public function getContractDocumentReference(): ?DocumentReference
    {
        return $this->contractDocumentReference;
    }

    public function setContractDocumentReference(?DocumentReference $contractDocumentReference): UBLInvoice
    {
        $this->contractDocumentReference = $contractDocumentReference;
        return $this;
    }

    public function getAdditionalDocumentReference(): ?DocumentReference
    {
        return $this->additionalDocumentReference;
    }

    public function setAdditionalDocumentReference(?DocumentReference $additionalDocumentReference): UBLInvoice
    {
        $this->additionalDocumentReference = $additionalDocumentReference;
        return $this;
    }

    public function getProjectReference(): ?DocumentReference
    {
        return $this->projectReference;
    }

    public function setProjectReference(?DocumentReference $projectReference): UBLInvoice
    {
        $this->projectReference = $projectReference;
        return $this;
    }

    /** @return InvoiceLine[]|null */
    public function getInvoiceLine(): ?array
    {
        return $this->invoiceLine;
    }

    /** @param InvoiceLine[]|null $invoiceLine */
    public function setInvoiceLine(?array $invoiceLine): UBLInvoice
    {
        $this->invoiceLine = $invoiceLine;
        return $this;
    }
}
