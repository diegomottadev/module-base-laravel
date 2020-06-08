<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
        //
    protected $table = 'provinces';
    protected $fillable = ['id','name','country_id'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
