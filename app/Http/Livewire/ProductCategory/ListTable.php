<?php

namespace App\Http\Livewire\ProductCategory;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    protected $listeners = ['$refresh'];
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $selected = [];

    public function render()
    {
        $category_tree = ProductCategory::where('name', 'like', '%'.$this->search.'%')->paginate(20);
        return view('livewire.product-category.list-table', compact('category_tree'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id) {
        ProductCategory::find($id)->delete();
    }

    public function delete_selected() {
        if(!empty($this->selected)) {
            foreach($this->selected as $category_id) {
                $category = ProductCategory::find($category_id);
                if($category) {
                    $category->delete();
                }
            }
        }
    }
}
