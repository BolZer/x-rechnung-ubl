<?php

declare(strict_types=1);

namespace Bolzer\XRechnungUbl\XRechnung3\Models;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

final class PaymentMeans
{
    #[Type('string')]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PaymentMeansCode')]
    private ?string $paymentMeansCode = null;

    #[Type(Id::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[SerializedName('PaymentID')]
    private ?Id $paymentId = null;

    #[Type(PayeeFinancialAccount::class)]
    #[XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[SerializedName('PayeeFinancialAccount')]
    private ?PayeeFinancialAccount $payeeFinancialAccount = null;

    public function getPaymentMeansCode(): ?string
    {
        return $this->paymentMeansCode;
    }

    public function setPaymentMeansCode(?string $paymentMeansCode): PaymentMeans
    {
        $this->paymentMeansCode = $paymentMeansCode;
        return $this;
    }

    public function getPaymentId(): ?Id
    {
        return $this->paymentId;
    }

    public function setPaymentId(?Id $paymentId): PaymentMeans
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    public function getPayeeFinancialAccount(): ?PayeeFinancialAccount
    {
        return $this->payeeFinancialAccount;
    }

    public function setPayeeFinancialAccount(?PayeeFinancialAccount $payeeFinancialAccount): PaymentMeans
    {
        $this->payeeFinancialAccount = $payeeFinancialAccount;
        return $this;
    }
}
