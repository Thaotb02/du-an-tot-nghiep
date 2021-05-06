<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title','content','featured_image','subject_id','author','status'];

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function categoryPost()

    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function infor()
    {
        return $this->belongsTo(Infor::class,'author','id');
    }
}