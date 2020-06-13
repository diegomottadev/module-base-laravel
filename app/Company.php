<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //
    use SoftDeletes;
    protected $table = 'companies';
    protected $fillable = ['id','name','cuit','compromise','trajectory','technologies','others'];
    protected $dates = ['created_at','updated_at','deleted_at'];


    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
