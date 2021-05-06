<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $dates = ['created_at','start_date','start_date','finish_date'];
    protected $fillable = ['member_id','typePackage_id','start_date','finish_date','discount_id','pt_id',
    'total_money','payment_method','status','pass','status_reserves','status_pass'
    ];
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function reserves()
    {
        return $this->hasMany(Reserve::class,'order_id','id');
    }
    public function membera()
    {
        return $this->belongsTo(Member::class,'pass_id','id');
    }
    public function pt()
    {
        return $this->belongsTo(Pt::class,'pt_id','id');
    }
    public function typePackage()
    {
        return $this->belongsTo(TypePackage::class,'typePackage_id','id');
    }
  
}
