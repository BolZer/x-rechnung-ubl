<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Documents;

use Bolzer\XRechnungUbl\XRechnung3\Models\Reference;
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

    #[Type(Reference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ContractDocumentReference')]
    private ?Reference $contractDocumentReference = null;

    #[Type(Reference::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('ProjectReference')]
    private ?Reference $projectReference = null;

    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\InvoiceLine>')]
    #[SerializedName('InvoiceLine')]
    #[XmlList(entry: 'InvoiceLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $invoiceLine = null;
}
