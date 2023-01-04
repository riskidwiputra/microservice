<?php

namespace App\Modules\order\Services;
 
use App\Modules\order\Interfaces\MidtransServiceInterface;

class MidtransService implements MidtransServiceInterface
{
    protected
    $midtrans_server_key,
    $midtrans_production,
    $midtrans_3ds;

    public function __construct()
    {
        $this->midtrans_server_key = env("MIDTRANS_SERVER_KEY");
        $this->midtrans_production = (bool) env('MIDTRANS_PRODUCTION');
        $this->midtrans_3ds = (bool) env('MIDTRANS_3DS');
    }

    public function getMidtransSnapUrl($params)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $this->midtrans_server_key;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = $this->midtrans_production;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = $this->midtrans_3ds;

        $snapUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
        return $snapUrl;
    }
}
