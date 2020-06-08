<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';
    protected $fillable = ['id','name'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function provinces()
    {
        return $this->hasMany('App\Province');
    }
}
