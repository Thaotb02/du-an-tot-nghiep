<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';
    protected $dates = ['created_at','start_day','finish_day'];
    protected $fillable = ['order_id','start_day','finish_day','price','status_pay',
    'reason','status','payment_method'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    
}
