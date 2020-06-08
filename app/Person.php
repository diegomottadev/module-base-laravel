<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Person extends Model
{
    //

    use SoftDeletes;
    protected $table = 'persons';
    protected $fillable = ['id','name','surname','nameComplete','cuil','dni','user_id'];
    protected $dates = ['created_at','updated_at','deleted_at','burndate'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function setBurndateAttribute($value)
    {
        $this->attributes['burndate'] = Carbon::createFromFormat('d/m/Y', $value->format('d/m/Y'));
    }

    public function getBurndateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setNameCompleteAttribute($value)
    {
        $this->attributes['nameComplete'] = $this->attributes['name']." ".$this->attributes['surname'];
    }

}
