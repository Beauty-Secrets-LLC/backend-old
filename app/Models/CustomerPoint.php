<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPoint extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = [
        'customer_id',
        'points'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function log() {
        return $this->hasMany(CustomerPointLog::class,'customer_point_id','id');
    }

    public function adjust($points = 0, $description = null, $type = 'user_adjust') {
        //register point log
        self::log()->create(['customer_point_id' => $this->id, 'points'=>$points, 'type' => $type, 'description' => $description]);
        return self::update(['points'=>$points]);
    }

    public function increase($points = 0, $description = null, $type = 'order_placed') {
        //register point log
        self::log()->create(['customer_point_id' => $this->id, 'points'=>$points, 'type' => $type, 'description' => $description]);
        return self::update(['points'=> ( $this->points + $points) ]);
    }

    public function decrease($points = 0, $description = null, $type = 'order_redeem') {
        //register point log
        self::log()->create(['customer_point_id' => $this->id, 'points'=>($points*-1), 'type' => $type, 'description' => $description]);
        return self::update(['points'=> ( ( $this->points - $points) < 0 ) ? 0 :  ( $this->points - $points)]);
    }


    public static function get_points($options) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = CustomerPoint::with([
            'customer'
        ]);

        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();

        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }
}
