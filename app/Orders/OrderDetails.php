<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(300);

        return [
            'name' => 'Gilang',
            'address' => 'Lombok Timur',
        ];
    }
}
