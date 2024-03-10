<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUblTests\Unit\XRechnung3;

use Bolzer\XRechnungUbl\XRechnung3\Builder;
use Bolzer\XRechnungUbl\XRechnung3\Documents\UBLInvoice;
use Bolzer\XRechnungUbl\XRechnung3\Models\AccountingParty;
use Bolzer\XRechnungUbl\XRechnung3\Models\Address;
use Bolzer\XRechnungUbl\XRechnung3\Models\Amount;
use Bolzer\XRechnungUbl\XRechnung3\Models\CommodityClassification;
use Bolzer\XRechnungUbl\XRechnung3\Models\Contact;
use Bolzer\XRechnungUbl\XRechnung3\Models\Country;
use Bolzer\XRechnungUbl\XRechnung3\Models\Id;
use Bolzer\XRechnungUbl\XRechnung3\Models\Identification;
use Bolzer\XRechnungUbl\XRechnung3\Models\InvoiceLine;
use Bolzer\XRechnungUbl\XRechnung3\Models\Item;
use Bolzer\XRechnungUbl\XRechnung3\Models\ItemClassificationCode;
use Bolzer\XRechnungUbl\XRechnung3\Models\LegalMonetaryTotal;
use Bolzer\XRechnungUbl\XRechnung3\Models\OrderLineReference;
use Bolzer\XRechnungUbl\XRechnung3\Models\Party;
use Bolzer\XRechnungUbl\XRechnung3\Models\PartyLegalEntity;
use Bolzer\XRechnungUbl\XRechnung3\Models\PartyName;
use Bolzer\XRechnungUbl\XRechnung3\Models\PartyTaxScheme;
use Bolzer\XRechnungUbl\XRechnung3\Models\PayeeFinancialAccount;
use Bolzer\XRechnungUbl\XRechnung3\Models\PaymentMeans;
use Bolzer\XRechnungUbl\XRechnung3\Models\PaymentTerms;
use Bolzer\XRechnungUbl\XRechnung3\Models\Period;
use Bolzer\XRechnungUbl\XRechnung3\Models\Price;
use Bolzer\XRechnungUbl\XRechnung3\Models\Quantity;
use Bolzer\XRechnungUbl\XRechnung3\Models\SellersItemIdentification;
use Bolzer\XRechnungUbl\XRechnung3\Models\TaxCategory;
use Bolzer\XRechnungUbl\XRechnung3\Models\TaxScheme;
use Bolzer\XRechnungUbl\XRechnung3\Models\TaxSubtotal;
use Bolzer\XRechnungUbl\XRechnung3\Models\TaxTotal;

test(
    'Allows building a valid XRechnung 3.0 document with a simple structure',
    function (string $pathToXmlExample) {
        $exampleXml = file_get_contents($pathToXmlExample);
        $exampleXml = $this->removeXmlMutates($exampleXml);
        $exampleXml = $this->reformatXml($exampleXml);

        $this->validateWithKositValidator($exampleXml);

        $invoice = (new UBLInvoice())
            ->setCustomizationId('urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0')
            ->setProfileId('urn:fdc:peppol.eu:2017:poacc:billing:01:1.0')
            ->setId('123456XX')
            ->setIssueDate('2016-04-04')
            ->setInvoiceTypeCode(380)
            ->setNote('#ADU#Es gelten unsere Allgem. Geschäftsbedingungen, die Sie unter […] finden.')
            ->setDocumentCurrencyCode('EUR')
            ->setBuyerReference('04011000-12345-03')
            ->setAccountingSupplierParty(
                (new AccountingParty())
                    ->setParty(
                        (new Party())
                            ->setEndpointId(
                                (new Id())
                                    ->setSchemeID('EM')
                                    ->setValue('seller@email.de')
                            )
                            ->setPartyName(
                                (new PartyName())
                                    ->setName('[Seller trading name]')
                            )
                            ->setPostalAddress(
                                (new Address())
                                    ->setStreetName('[Seller address line 1]')
                                    ->setCityName('[Seller city]')
                                    ->setPostalZone('12345')
                                    ->setCountry(
                                        (new Country())
                                            ->setIdentificationCode('DE')
                                    )
                            )
                            ->setPartyTaxScheme(
                                [
                                    (new PartyTaxScheme())
                                        ->setCompanyId('DE 123456789')
                                        ->setTaxScheme(
                                            (new TaxScheme())
                                                ->setId('VAT')
                                        ),
                                ]
                            )
                            ->setPartyLegalEntity(
                                (new PartyLegalEntity())
                                    ->setId((new Id())->setValue('[HRA-Eintrag]'))
                                    ->setCompanyLegalForm('123/456/7890, HRA-Eintrag in […]')
                                    ->setRegistrationName('[Seller name]')
                            )
                            ->setContact((new Contact())
                                ->setName('nicht vorhanden')
                                ->setTelephone('+49 1234-5678')
                                ->setElectronicMail('seller@email.de'))
                    )
            )
            ->setAccountingCustomerParty(
                (new AccountingParty())
                    ->setParty(
                        (new Party())
                            ->setEndpointId(
                                (new Id())
                                    ->setSchemeID('EM')
                                    ->setValue('buyer@info.de')
                            )
                            ->setPartyIdentification(
                                (new Identification())
                                    ->setId((new Id())->setValue('[Buyer identifier]'))
                            )
                            ->setPostalAddress(
                                (new Address())
                                    ->setStreetName('[Buyer address line 1]')
                                    ->setCityName('[Buyer city]')
                                    ->setPostalZone('12345')
                                    ->setCountry(
                                        (new Country())
                                            ->setIdentificationCode('DE')
                                    )
                            )
                            ->setPartyLegalEntity(
                                (new PartyLegalEntity())
                                    ->setRegistrationName('[Buyer name]')
                            )
                    )
            )
            ->setPaymentMeans(
                (new PaymentMeans())
                    ->setPaymentMeansCode('58')
                    ->setPayeeFinancialAccount(
                        (new PayeeFinancialAccount())
                            ->setId(
                                (new Id())
                                    ->setValue('DE75512108001245126199')
                            )
                    )
            )
            ->setPaymentTerms(
                (new PaymentTerms())
                    ->setNote('Zahlbar sofort ohne Abzug.')
            )
            ->setTaxTotal([
                (new TaxTotal())
                    ->setTaxAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('22.04')
                    )
                    ->setTaxSubtotal([
                        (new TaxSubtotal())
                            ->setTaxableAmount(
                                (new Amount())
                                    ->setCurrencyID('EUR')
                                    ->setValue('314.86')
                            )
                            ->setTaxAmount(
                                (new Amount())
                                    ->setCurrencyID('EUR')
                                    ->setValue('22.04')
                            )
                            ->setTaxCategory(
                                (new TaxCategory())
                                    ->setId(
                                        (new Id())
                                            ->setValue('S')
                                    )
                                    ->setPercent(7)
                                    ->setTaxScheme(
                                        (new TaxScheme())
                                            ->setId('VAT')
                                    )
                            ),
                    ]),
            ])
            ->setLegalMonetaryTotal(
                (new LegalMonetaryTotal())
                    ->setLineExtensionAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('314.86')
                    )
                    ->setTaxExclusiveAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('314.86')
                    )
                    ->setTaxInclusiveAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('336.9')
                    )
                    ->setPayableAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('336.9')
                    )
            )

            ->setInvoiceLine([
                (new InvoiceLine())
                    ->setId(
                        (new Id())
                            ->setValue('Zeitschrift [...]')
                    )
                    ->setNote('Die letzte Lieferung im Rahmen des abgerechneten Abonnements erfolgt in 12/2016 Lieferung erfolgt / erfolgte direkt vom Verlag')
                    ->setInvoicedQuantity(
                        (new Quantity())
                            ->setUnitCode('XPP')
                            ->setValue('1')
                    )
                    ->setLineExtensionAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('288.79')
                    )
                    ->setInvoicePeriod(
                        (new Period())
                            ->setStartDate('2016-01-01')
                            ->setEndDate('2016-12-31')
                    )
                    ->setOrderLineReference(
                        (new OrderLineReference())
                            ->setLineID(
                                (new Id())
                                    ->setValue('6171175.1')
                            )
                    )
                    ->setItem(
                        [
                            (new Item())
                                ->setDescription('Zeitschrift Inland')
                                ->setName('Zeitschrift [...]')
                                ->setSellersItemIdentification(
                                    (new SellersItemIdentification())
                                        ->setId(
                                            (new Id())
                                                ->setValue('246')
                                        )
                                )
                                ->setCommodityClassification(
                                    (new CommodityClassification())
                                        ->setItemClassificationCode(
                                            (new ItemClassificationCode())
                                                ->setListId('IB')
                                                ->setValue('0721-880X')
                                        )
                                )
                                ->setClassifiedTaxCategory(
                                    (new TaxCategory())
                                        ->setId(
                                            (new Id())
                                                ->setValue('S')
                                        )
                                        ->setPercent(7)
                                        ->setTaxScheme(
                                            (new TaxScheme())
                                                ->setId('VAT')
                                        )
                                ),
                        ]
                    )
                    ->setPrice(
                        (new Price())
                            ->setPriceAmount(
                                (new Amount())
                                    ->setCurrencyID('EUR')
                                    ->setValue('288.79')
                            )
                    ),
                (new InvoiceLine())
                    ->setId(
                        (new Id())
                            ->setValue('Porto + Versandkosten')
                    )
                    ->setInvoicedQuantity(
                        (new Quantity())
                            ->setUnitCode('XPP')
                            ->setValue('1')
                    )
                    ->setLineExtensionAmount(
                        (new Amount())
                            ->setCurrencyID('EUR')
                            ->setValue('26.07')
                    )
                    ->setItem(
                        [
                            (new Item())
                                ->setName('Porto + Versandkosten')
                                ->setClassifiedTaxCategory(
                                    (new TaxCategory())
                                        ->setId(
                                            (new Id())
                                                ->setValue('S')
                                        )
                                        ->setPercent(7)
                                        ->setTaxScheme(
                                            (new TaxScheme())
                                                ->setId('VAT')
                                        )
                                ),
                        ]
                    )
                    ->setPrice(
                        (new Price())
                            ->setPriceAmount(
                                (new Amount())
                                    ->setCurrencyID('EUR')
                                    ->setValue('26.07')
                            )
                    ),
            ])
        ;

        $xml = Builder::create()->transformUblDocumentToXml($invoice);
        $xml = $this->reformatXml($xml);

        $this->assertSame($exampleXml, $xml);
        $this->validateWithKositValidator($xml);
    }
)->with([
    __DIR__ . '/Examples/Builder/01.01a-INVOICE_ubl.xml',
]);
