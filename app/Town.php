<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    protected $table = 'towns';
    protected $fillable = ['id','name','city_id'];
    protected $dates = ['created_at','updated_at','deleted_at'];

}
