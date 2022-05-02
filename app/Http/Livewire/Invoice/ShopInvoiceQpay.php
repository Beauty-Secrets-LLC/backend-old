<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\Services\Payments\Qpay;

class ShopInvoiceQpay extends Component
{

    public $invoice;
    public $payment_response;

    public function render()
    {
        return view('livewire.invoice.shop-invoice-qpay');
    }

    public function checkPayment() {
        $qpay_class = new Qpay();
        $data = array(
            "object_type" 	=> "INVOICE",
            "object_id" 	=> $this->invoice['data']['invoice_id'],
            "offset" => [
                "page_number"=> 1,
                "page_limit" => 100
            ]
        );
        $this->payment_response = $qpay_class->checkInvoice($data);

    }
}
