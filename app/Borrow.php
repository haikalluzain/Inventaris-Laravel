<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = ['date_borrow','date_return','employee_id','officer_id','status'];

    public function employee()
    {
        return $this->hasOne('App\Employee','id','employee_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','officer_id');
    }

    public function borrowDetail()
    {
        return $this->hasMany('App\BorrowDetail','borrow_id','id');
    }
}
