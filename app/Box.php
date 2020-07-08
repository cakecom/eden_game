<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    //
    protected $fillable=['name','description','price','bonus'];

    public function item() {
        return $this->hasMany('App\Item','boxes_id','id');
    }
}
