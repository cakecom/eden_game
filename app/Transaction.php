<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable=['username','count','box_id','item_id','price','balance','balance_bonus','bonus'];
    public function item(){
        return $this->belongsTo('App\Item','item_id','id');
    }
    public function box(){
        return $this->belongsTo('App\Box','box_id','id');
    }
}
