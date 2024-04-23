<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

class PaymentMpcontroller extends Controller
{
    // retorna a pagina index dos pagamentos
    public function index() {
        // $payments = Payment::all();

        // return view('payments.index', compact('payments'));
    }

    // Teste MP
    public function testPay() {
        
        // Configure a SDK do Mercado Pago
            MercadoPagoConfig::setAccessToken("TEST-1698946220018523-100818-c582523b4ab14fa6aa71862cfde2a37c-555591338");

        // Step 3: Initialize the API client
        $client = new PaymentClient();

        try {

            // Step 4: Create the request array
            $request = [
                "transaction_amount" => 100,
                "token" => "9b2d63e00d66a8c721607214ceda233a",
                "description" => "description",
                "installments" => 1,
                "payment_method_id" => "visa",
                "payer" => [
                    "email" => "user@test.com",
                ]
            ];

            // Step 5: Create the request options, setting X-Idempotency-Key
            $request_options = new RequestOptions();
            $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

            // Step 6: Make the request
            $payment = $client->create($request, $request_options);
            echo $payment->id;

        // Step 7: Handle exceptions
        } catch (MPApiException $e) {
            echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
            echo "Content: ";
            var_dump($e->getApiResponse()->getContent());
            echo "\n";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        
    }

}
 