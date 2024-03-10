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

    #[Type('array<Bolzer\XRechnungUbl\XRechnung3\Models\TaxTotal>')]
    #[SerializedName('TaxTotal')]
    #[XmlList(entry: 'TaxTotal', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private ?array $taxTotal = null;

    #[Type(LegalMonetaryTotal::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('LegalMonetaryTotal')]
    private ?LegalMonetaryTotal $legalMonetaryTotal = null;
}
