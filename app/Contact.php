<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['id','email','telphone','celphone','web'];
    protected $dates = ['created_at','updated_at'];

}
