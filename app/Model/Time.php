<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $fillable = ['time_name','time_start','time_finish'];
    protected $dates = ['time_start','time_finish'];
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'time_id','id');
    }
}
