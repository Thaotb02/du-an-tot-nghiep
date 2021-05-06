<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['pt_id','time_id','date'];
    protected $dates = ['date'];
    public function pt()
    {
        return $this->belongsTo(Pt::class,'pt_id','id');
    }
    public function time()
    {
        return $this->belongsTo(Time::class,'time_id','id');
    }
}
