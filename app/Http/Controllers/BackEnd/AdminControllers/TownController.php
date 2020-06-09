<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\City;
use App\Http\Controllers\Controller;
use App\Town;
use Illuminate\Http\Request;

class TownControler extends Controller
{
    //
    public function getTowns($id){
        $city = City::findOrFail($id);
        $towns = Town::where('city_id',$city->id)->selectRaw('id,name')->get();
        return response()->json($towns);
    }
}
