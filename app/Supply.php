<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
	protected $guarded = [];

	public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }

	public function user()
    {
        return $this->hasOne('App\User','id','officer_id');
    }
}
