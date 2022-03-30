<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CustomerAddress;
use App\Models\CustomerCard;

class Customer extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function addresses(){
        return $this->hasMany(CustomerAddress::class);
    }

    public function cards(){
        return $this->hasMany(CustomerCard::class);
    }


    public static function get_customers($options = null) {
        $result = [];
        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Customer::with([
            'addresses',
            'cards'
        ]);
        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();


        //Search by Name and Tags
        if (isset($options['search_key']) && trim($options['search_key'])) {
            $query->whereRaw('name like "%'.$options['search_key'].'%"')
            ->orwhereRaw('phone_primary like "'.$options['search_key'].'%"')
            ->orwhereRaw('email like "'.$options['search_key'].'%"');
        }



        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }

    public static function get_customer($id) {
        $query = Customer::with([
            'addresses',
            'cards'
        ])->find($id);
        return $query->toArray();
    }
}
