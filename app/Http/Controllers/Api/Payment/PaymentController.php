<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use WandesCardoso\MercadoPago\DTO\Subscription;
use WandesCardoso\MercadoPago\DTO\Plan;
use WandesCardoso\MercadoPago\Enums\Currency;
use WandesCardoso\MercadoPago\Enums\FrequencyType;
use WandesCardoso\MercadoPago\Enums\PaymentType;
use WandesCardoso\MercadoPago\Enums\Status;
use WandesCardoso\MercadoPago\Facades\MercadoPago;

class PaymentController extends Controller
{
    public function testpayment(Request $request)
    {
 

        $plan = Plan::make()
            ->setFrequency(1)
            ->setFrequencyType(FrequencyType::MONTHS)
            ->setRepetitions(12)
            ->setBillingDay(15)
            ->setBillingDayProportional(true)
            ->setFreeTrial(30, FrequencyType::DAYS)
            ->setTransactionAmount(100)
            ->setCurrencyId(Currency::BRL)
            ->setReason('Test plan')
            ->setBackUrl('https://mysite.com.br/backurl')
            ->setPaymentMethodsAllowed([PaymentType::CREDIT_CARD, PaymentType::DEBIT_CARD]);
            
    $response = MercadoPago::plan()->create($plan);
    
    return response()->json($response, 200);
    }
}
