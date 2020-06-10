<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'addresses';
    protected $maps = [
        'country_id' => 'country',
        'province_id' => 'province',
        'city_id' => 'city',
        'town_id' => 'town'
    ];
    protected $append = ['country', 'province', 'city', 'town'];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'dpto', 'floor', 'address', 'country', 'province', 'city', 'town'];

    //protected $hidden = ['country_id', 'province_id','city_id','town_id'];

    public function setCountryAttribute($value)
    {
     
        return $this->attributes['country_id'] = $value;
    }

    public function setProvinceAttribute($value)
    {
        return $this->attributes['province_id'] = $value;
    }

    public function setCityAttribute($value)
    {
        return $this->attributes['city_id'] = $value;
    }

    public function setTownAttribute($value)
    {
        return $this->attributes['town_id'] = $value;
    }
}
