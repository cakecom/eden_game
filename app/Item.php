<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['name','code','rate','number','image','priority','boxes_id'];
public function rate_r(){
    return $this->belongsTo('App\Rate','priority','id');
}
}
