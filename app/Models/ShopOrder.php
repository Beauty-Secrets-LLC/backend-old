<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ShopOrder extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = "orders";
    protected $casts = [
        'address'       => 'array',
        'data'          => 'array',
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = [
        'order_number',
        'status',
        'customer_name',
        'customer_phone',
        'customer_email',
        'subtotal',
        'total',
        'address',
        'delivery_id',
        'data'
    ];

    const STATUS_ONHOLD     = 'on-hold'; //Баталгаажаагүй төлбөр хүлээгдэж байгаа
    const STATUS_PROCESSING = 'processing'; //Төлбөр төлөгдөж баталгаажсан. Бэлтгэгдэж байгаа
    const STATUS_COMPLETED  = 'completed'; //Захиалгыг хүргэж дуусгасан
    const STATUS_CANCELLED  = 'cancelled'; //Захиалгыг цуцласан


    public function customer() {
        return $this->belongsTo(Customer::class,'customer_phone', 'phone_primary');
    }

    public function address() {
        return $this->belongsTo(CustomerAddress::class,'address_id','id');
    }
    public function items() {
        return $this->hasMany(ShopOrderItem::class,'order_id','id');
    }

    public function invoice() {
        return $this->hasOne(ShopOrderInvoice::class,'order_id','id');
    }

    // public static function get_orders($options) {
    //     $result = [];

    //     $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        
    //     $query = ShopOrder::with([
    //         'customer',
    //         'address' => function($address) {
    //             $address->select(
    //                 'id', 
    //                 'phone', 
    //                 'city', 
    //                 'district', 
    //                 'khoroo', 
    //                 'address',
    //                 \DB::raw('CONCAT(city,", ", district,", ",khoroo,", ",address) as full_address')
    //             );
    //         },
    //     ]);

    //     if (isset($options['date']) && trim($options['date'])) {
    //         $date_range = explode('-', $options['date']);
    //         $sdate = date("Y-m-d", strtotime($date_range[0]));
    //         $edate = date("Y-m-d", strtotime($date_range[1]));
    //     }
    //     else {
    //         $sdate = date('Y-m').'-01';
    //         $edate = date('Y-m-t');
    //     }

    //     $query->whereBetween('created_at', array($sdate . ' 00:00:00', $edate . ' 23:59:59'));

    //     //Нийт бичлэгийн тоог авч бна
    //     $result['recordsTotal'] = $query->count();

    //     if (isset($options['id']) && !empty($options['id'])) {
    //         $query->whereRaw('order_number like "%'.$options['id'].'%"');
    //     }


    //     //Шүүлт хийсний дараах бичлэгийн тоог авч бна
    //     $result["recordsFiltered"] = $query->count();
        
    //     if(isset($options['start']) && isset($options['length']))
    //         $query->offset($options['start'])->limit($options['length']);
        

    //     $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();

    //     $result['draw']++;
    //     return $result;
    // }

    public static function get_order($id) {
        $order = ShopOrder::with([
            'customer',
            'items.product.productMedia'=> function($media) {
                $media->with('media')->where('collection_name', 'featured_image');
            },
            'items.variation',
            'invoice.payment_method',
            'invoice.vat',
        ])->where('id', $id)->first();
        if($order) {
            return $order->toArray(); 
        }  
        else 
            return null;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('order_log')
        ->logOnlyDirty();
    }

    

    public static function OrderNumberGenerator($order) {
        return $ordernumber = 'BS-'.date('ymd').$order->id;
    }
}
