<?php

namespace App\Http\Livewire\Media;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Media;

class ListView extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    

    public $selected_file;
    public $search = '';
    
    protected $listeners = [
        '$refresh',
        'media:delete' => 'delete'
    ];


    public function render()
    {
        $files = Media::with('user')->orderby('id','desc')->paginate(30);
        return view('livewire.media.list-view', compact('files'));
    }

    public function details($index) {
       
        $this->dispatchBrowserEvent('show-details');
        $this->selected_file = $index;
    }

    function confirm_delete($id) {
        $this->dispatchBrowserEvent('confirm-delete', ['id' => $id ]);
    }

    function delete($id) {
        
        $delete = Media::find($id)->delete();
        $this->dispatchBrowserEvent('hide-details'); 
        
    }
}
