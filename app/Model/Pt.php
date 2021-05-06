<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pt extends Model
{
    protected $table = 'pts';
    protected $fillable = ['infor_id','salary','descriptions','ratting','subject_id','status'];
    public function infor()
    {
        return $this->belongsTo(Infor::class,'infor_id','id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class,'pt_id','id');
    }
    public function commentPts()
    {
        return $this->hasMany(CommentPt::class,'pt_id','id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'pt_id','id');
    }
    public function typePackages()
    {
        return $this->hasMany(TypePackage::class,'pt_id','id');
    }
    public function members()
    {
        return $this->hasMany(Member::class,'pt_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'pt_id','id');
    }
}
