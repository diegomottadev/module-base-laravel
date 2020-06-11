<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'contacts';
    protected $fillable = ['id','email','telphone','celphone','web'];
    protected $dates = ['created_at','updated_at'];

}
