<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;

class ListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['$refresh','deleteProducts' => 'delete_product', 'set:categories'=>'setCategories'];
    public $search = '';
    public $selectPage = false;
    public $filters = ['status' => '', 'brand'=> '', 'categories' => ''];
    public $checked_products = [];
    public $brands;
    public $categories;

    public function getProductsProperty() {
        return Product::with([
            'productMedia' => function($media) {
                $media->with('media')->where('collection_name', 'featured_image');
            },
            'brand',
            'productCategory'
        ])->select(
            'id',
            'name',
            'slug',
            'regular_price',
            'sale_price',
            'brand_id',
            'status',
            'created_at',
        )
        ->when($this->filters['status'], function($q, $status){
            if($this->filters['status'] == 'trashed') {
                $q->onlyTrashed();
            }
            else {
                $q->where('status', $status);
            }
        })
        ->when($this->filters['brand'], fn($q, $brand) => $q->where('brand_id', $brand))
        ->when($this->filters['categories'], function($q, $categories) {  
            $q->whereHas('productCategory', function($cats) use($categories) {
                $cats->where(function($c) use($categories){
                    $c->where('product_categories.id', $categories);
                });
            });
        })
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('created_at', 'DESC')
        ->paginate(20);
    }

    public function mount() {
        $this->brands = Brand::pluck('name', 'id');
        $this->categories = ProductCategory::get()->toArray();
    }

    public function render() {
        $products = $this->products;
        return view('livewire.product.list-table', compact('products'));
    }

    public function updatingSearch(){ $this->resetPage(); }

    public function resetFilters() { $this->reset(['search', 'filters']); }

    public function updatedFilters() {
        $this->resetPage();
    }

    public function updatedSelectPage($value) {
        $this->checked_products = ($value) ? $this->products->pluck('id')->map(fn($id) => (string) $id) : [];
    }

    public function deleteChecked() {

        $this->dispatchBrowserEvent('swal:deleteProducts', [
            'title' => 'Баталгаажуулалт', 
            'html' => 'Та сонгосон '.count( $this->checked_products).' бүтээгдэхүүнийг устгах гэж байна уу ?',
            'products' => $this->checked_products
        ]);
    }

    public function setCategories($ids) {
        $this->filters['categories'] = (!empty($ids)) ? $ids : '';
    }

    public function delete_product($ids) {
        if(auth()->user()->hasPermissionTo('product_delete')) {
            $products = Product::withTrashed()->whereIn('id', $ids)->get();
            if($products) {
                foreach($products as $product)  {
                    if ($product->trashed()) {
                        //Permanant delete
                        $product->forceDelete();
                    } 
                    else {
                        //Soft delete
                        $product->delete();
                    }
                }
                $this->dispatchBrowserEvent('toastr:success', [
                    'message' => 'Амжилттай устгалаа.',
                ]);
                $this->checked_products = [];
                $this->reset('selectPage');
            }
        }
        else {
            $this->dispatchBrowserEvent('swal:failed', [
                'title' => 'Амжилтгүй', 
                'html' => 'Уучлаарай, Та энэ үйлдлийг хийх эрхгүй байна.'
            ]);
        }
    }
}
