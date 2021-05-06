<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypePackage extends Model
{
    protected $table = 'typepackages';
    protected $dates = ['created_at','start_date','finish_date'];
    protected $fillable = ['TypePackage_name','price','price_sale','security','subject_id','description','status','catetoryPackage'];
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function pt()
    {
        return $this->belongsTo(Pt::class,'pt_id','id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'typePackage_id','id');
    }

}
