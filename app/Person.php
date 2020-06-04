<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
