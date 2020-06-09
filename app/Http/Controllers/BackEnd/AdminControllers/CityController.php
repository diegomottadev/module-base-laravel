<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class CityControler extends Controller
{
    //
    public function getCities($id){
        $province = Province::findOrFail($id);
        $cities = City::where('province_id',$province->id)->selectRaw('id,name')->get();;
        return response()->json($cities);
    }
}
