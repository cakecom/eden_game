<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $connection='pgsql3';
    protected $table='accounts';
}
