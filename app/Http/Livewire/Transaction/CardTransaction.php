<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\SubscriptionTransaction;

class CardTransaction extends Component
{
    public $card_id;
    public $local_transactions;
    public $card_transaction;

    protected $listeners = ['getTransactionFromCard' => 'getTransactionFromCardApi'];

    public function mount($local_transactions)
    {
        $this->local_transactions = $local_transactions;
    }

    public function render()
    {
        return view('livewire.transaction.card-transaction');
    }

    public function getTransactionFromCardApi() {
        $this->card_transaction = SubscriptionTransaction::get_list_by_card_api($this->card_id);
    }
}
