<?php

namespace App\Http\Controllers\FrontEnd\PublicsControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    //
    public function index(){
        return view('public/home');
    }


    
}
