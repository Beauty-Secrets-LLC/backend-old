<?php

namespace App\Services\Payments;

use Illuminate\Support\Facades\Http;
use App\Exceptions\ArrayException;

class Qpay {

    protected $client_id;
    protected $client_secret;
    protected $invoice_code;
    private $access_token;
    
    public function __construct() {
        $this->client_id = 'BEAUTY_SECRETS';
        $this->client_secret = '6hCaKop2';
        $this->invoice_code = 'BS_INVOICE';
        $this->access_token = $this->getToken()['access_token'];
    }

    private function getToken(){
        $response = Http::withBasicAuth($this->client_id, $this->client_secret)->post('https://merchant.qpay.mn/v2/auth/token')->json();
        return $response;
    }

    public function createInvoice($data) {
        /*
            $data = array(
                "sender_invoice_no"		=> 'Manal220421',
                "invoice_receiver_data" => array(
                    "register"	=> '90911025',
                    "name"		=> 'Manal',
                    "email"		=> 'Manaltseren@gmail.com',
                    "phone"		=> '90911025'
                ),
                "invoice_description"	=> 'test is here',
                "amount"				=> 20,
                "callback_url"			=> "https://beautysecrets.mn/wp-json/payment/v1/qpay-v2?payment_id=Manal220421"
            );
        */
        $data["invoice_code"]           = $this->invoice_code;
        $data["invoice_receiver_code"]  = "terminal";
        $response = Http::withToken($this->access_token)->post('https://merchant.qpay.mn/v2/invoice', $data)->json();
        return $response;
    }

    public function checkInvoice($data) {
        $response = Http::withToken($this->access_token)->post('https://merchant.qpay.mn/v2/payment/check', $data)->json();
        return $response;
    }
}