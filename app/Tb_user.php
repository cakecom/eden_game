<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_user extends Model
{
    //
    protected $connection ='pgsql2';
    protected $table = 'tb_user';
    protected $fillable =['pavlues'];
    public $timestamps = false;
}
