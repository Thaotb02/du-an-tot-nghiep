<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Infor extends Authenticatable
{
    protected $table = 'infors';
    protected $dates = ['created_at','birth_date'];
    protected $fillable = ['name','birth_date','gender','address','phone','avatar','email',
     'remember_token','description','password',' source','role'];
    public function admin()
    {
        return $this->hasOne(Admin::class,'infor_id','id');
    }
    public function member()
    {
        return $this->hasOne(Member::class,'infor_id','id');
    }
    public function pt()
    {
        return $this->hasOne(Pt::class,'infor_id','id');
    }
   
}