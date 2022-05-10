<?php

namespace App\Http\Livewire\Giftcard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GiftCardTemplate;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TemplateListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';


    public function render()
    {
        $templates = GiftCardTemplate::where('template_name', 'like', '%'.$this->search.'%')->paginate(30);
        return view('livewire.giftcard.template-list-table', compact('templates'));
    }
}
