<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['content','member_id','pt_id'];
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function pt()
    {
        return $this->belongsTo(Pt::class,'pt_id','id');
    }
}
