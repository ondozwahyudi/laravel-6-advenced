<?php

namespace App\Billing;

use Illuminate\Support\Str;

class PaymentGateway implements PaymentGatewayContract
{

    private $currency;
    private $tester;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->tester = 0;
    }
    public function setDiscount($amount)
    {
        $this->test = $amount;
    }
    public function charge($amount)
    {
        //charge the bank
        return [
            'amount' => $amount - $this->test,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'test' => $this->test
        ];
    }
}
