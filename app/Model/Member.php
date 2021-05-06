<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $dates = ['created_at',];
    protected $fillable = ['infor_id','pt_id','health','status','weight','height','status'];
    public function infor()
    {
        return $this->belongsTo(Infor::class,'infor_id','id');
    }
    public function pt()
    {
        return $this->belongsTo(Pt::class,'pt_id','id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class,'member_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'member_id','id');
    }
    public function commentPts()
    {
        return $this->hasMany(CommentPts::class,'member_id','id');
    }
    public function discounts()
    {
        return $this->hasMany(Discount::class,'member_id','id');
    }
}
