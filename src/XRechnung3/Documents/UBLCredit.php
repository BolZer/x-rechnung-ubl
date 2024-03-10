<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Documents;

use JMS\Serializer\Annotation\AccessorOrder;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;

#[XmlRoot('CreditNote')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2', prefix: '')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[AccessorOrder(order: 'custom', custom: [
    'customizationId',
    'profileId',
    'id',
    'issueDate',
    'creditNoteTypeCode',
    'note',
    'documentCurrencyCode',
    'taxCurrencyCode',
    'buyerReference',
    'invoicePeriod',
    'orderReference',
    'originatorDocumentReference',
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
final class UBLCredit extends UBLAbstractDocument
{
    #[Type('int')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('CreditNoteTypeCode')]
    private ?int $creditNoteTypeCode = null;

    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('TaxCurrencyCode')]
    private ?string $taxCurrencyCode = null;

    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\CreditNoteLine>')]
    #[SerializedName('CreditNoteLine')]
    #[XmlList(entry: 'CreditNoteLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $creditNoteLine = null;
}
