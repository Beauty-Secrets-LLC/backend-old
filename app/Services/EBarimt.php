<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\ArrayException;

class EBarimt {

    protected   $ebarimt_user;
    protected   $ebarimt_pass;
    private     $access_token;
    
    public function __construct() {
        $this->ebarimt_user = '5883127';
        $this->ebarimt_pass = 'OMR8KLP2FVCAO24336AHOBX6K1';
        $this->access_token = $this->getToken()['access_token'];
    }

    private function getToken(){
        $response = Http::post('https://vat.beautysecrets.mn/auth/login',['username' => $this->ebarimt_user, 'password' => $this->ebarimt_pass])->json();
        return $response;
    }

    public function info() {
        $response = Http::withToken($this->access_token)->post('https://vat.beautysecrets.mn/pos/getInformation'
        )->json();
        return $response;
    }

    public function put($data) {
        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json'
        ])->withToken($this->access_token)->post('https://vat.beautysecrets.mn/pos/put', $data
        )->json();
        return $response;
    }
}