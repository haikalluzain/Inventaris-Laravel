<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;

class Employee extends Model implements AuthenticatableContracts
{
    use Authenticatable;

    protected $guarded = [];
}
