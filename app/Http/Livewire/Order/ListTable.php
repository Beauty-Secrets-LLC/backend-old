<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShopOrder;

class ListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        '$refresh',
        'order:delete' => 'deleteOrders'
    ];
    public $search = '';
    public $filters = [
        'status' => '', 
        'phone' => '', 
        'email' => ''
    ];
    public $selectPage = false;
    public $checked_orders = [];

    public function getOrdersProperty() {
        return ShopOrder::with([
            'customer',
            'invoice.payment_method'
        ])
        ->when($this->filters['status'], function($q, $status){
            if($this->filters['status'] == 'trashed') {
                $q->onlyTrashed();
            }
            else {
                $q->where('status', $status);
            }
        })
        ->when($this->filters['phone'], fn($q, $phone) => $q->where('customer_phone','like', $phone.'%'))
        ->when($this->filters['email'], fn($q, $email) => $q->where('customer_email','like', $email.'%'))
        ->where('order_number', 'like', '%'.$this->search.'%')
        ->orderby('created_at', 'DESC')
        ->paginate(20);
    }

    public function updatedSelectPage($value) {
        $this->checked_orders = ($value) ? $this->orders->pluck('id')->map(fn($id) => (string) $id) : [];
    }

    public function updatingSearch() { $this->resetPage(); }
    public function updatedFilters() { $this->resetPage(); }

    public function render()
    {
        $orders = $this->orders;
        return view('livewire.order.list-table', compact('orders'));
    }

    public function deleteChecked() {
        $this->dispatchBrowserEvent('swal:deleteOrders', [
            'title' => 'Баталгаажуулалт', 
            'html' => 'Та сонгосон '.count( $this->checked_orders).' захиалгуудыг устгах гэж байна уу ?',
            'orders' => $this->checked_orders
        ]);
    }

    public function deleteOrders($ids) {
        if(auth()->user()->hasPermissionTo('order_delete')) {
            $orders = ShopOrder::withTrashed()->whereIn('id', $ids)->get();
            foreach($orders as $order) {
                if ($order->trashed()) {
                    //Permanant delete
                    $order->forceDelete();
                } 
                else {
                    //Soft delete
                    $order->delete();
                }
            }
            $this->dispatchBrowserEvent('toastr:success', [
                'message' => 'Амжилттай устгалаа.',
            ]);
            $this->checked_orders = [];
        }
        else {
            $this->dispatchBrowserEvent('swal:failed', [
                'title' => 'Амжилтгүй', 
                'html' => 'Уучлаарай, Та энэ үйлдлийг хийх эрхгүй байна.'
            ]);
        }
    }
    

}
