<?php

namespace App\Http\Livewire\Coupon;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coupon;

class ListTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    protected $listeners = [
        '$refresh',
        'coupons:delete' => 'delete'
    ];


    public function render()
    {

        $coupons = Coupon::where('code', 'like', '%'.$this->search.'%')->paginate(30);
        return view('livewire.coupon.list-table', compact('coupons'));
    }

    public function updated() {
        // if(!empty($this->all_coupons)) {
        //     foreach($this->all_coupons as $index => $coupon) {
        //         if($coupon) {
        //             $this->selected_coupons[$index] = $coupon;
        //         }
        //         else {
        //             unset( $this->selected_coupons[$index]);
        //         }
        //     }
        // }
    }

    public function delete($coupons) {
        Coupon::whereIn('id', $coupons)->delete();
    }
}
