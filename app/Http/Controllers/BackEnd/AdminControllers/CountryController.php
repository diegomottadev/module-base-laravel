<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function getCountries(){
        $countries = Country::selectRaw('id,name')->get();;
        return response()->json($countries);
    }

    public function getCountry($id){
        $country = Country::findOrFail($id);
        return response()->json($country);
    }
}
