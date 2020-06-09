<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Country;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class ProvinceControler extends Controller
{
    //
    public function getProvinces($id){
        $country = Country::findOrFail($id);
        $provinces = Province::where('country_id',$country->id)->selectRaw('id,name')->get();;
        return response()->json($provinces);
    }
}
