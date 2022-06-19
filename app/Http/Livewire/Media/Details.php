<?php

namespace App\Http\Livewire\Media;

use Livewire\Component;
use App\Models\Media;

class Details extends Component
{
    protected $listeners = [
        '$refresh',
        'media:details' => 'show_details'
    ];

    public $selected_media;

    public function render()
    {
        return view('livewire.media.details');
    }

    function show_details($id) {

        $this->selected_media = Media::find($id);
       // $this->ShopOrderInvoice('show-details', 'media_detail');
        
    }
}
