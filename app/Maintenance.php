<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\User','id','maintainer_id');
    }

    public function borrow()
    {
        return $this->hasOne('App\Borrow','id','borrow_id');
    }

    public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }
}
