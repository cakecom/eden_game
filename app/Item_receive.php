<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_receive extends Model
{
    //
    protected $connection='pgsql3';
    protected $table='item_receivable';
    public $timestamps = false;
    protected $fillable=['state','account_name','item_id','item_quantity','world_id','amount'];
}
