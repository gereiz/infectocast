<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use WandesCardoso\MercadoPago\Facades\MercadoPago;
use WandesCardoso\MercadoPago\DTO\Item;
use WandesCardoso\MercadoPago\DTO\Payer;
use WandesCardoso\MercadoPago\DTO\Payment;

class PaymentMpcontroller extends Controller
{
    // retorna a pagina index dos pagamentos
    public function index() {
        // $payments = Payment::all();

        return view('payments.index', compact('payments'));
    }

    // Teste MP
    public function testPay() {
        $payer = new Payer(
            'georgie.reis@outlook.com',
            'Georgie',
            'Reis'
        );

    
        $item = Item::make()
                    ->setTitle('title product')
                    ->setQuantity(1)
                    ->setUnitPrice(100)
                    ->setDescription('description product')
                    ->setPictureUrl('https://www.mercadopago.com/org-img/MP3/home/logomp3.gif')
                    ->setCategoryId('electronics');

        $payment = Payment::make()
                    ->setPayer($payer)
                    ->addItem($item)
                    ->setPaymentMethodId('pix')
                    ->setExternalReference('123434567');

        $response = MercadoPago::payment()->create($payment);

        dd($response);
    }

}
 