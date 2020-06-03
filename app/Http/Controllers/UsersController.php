<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UsersController extends Controller
{
    //
    public function index(){
        return view('admin/users/index');
    }

    public function new(){
        return view('admin/users/new');
    }
}
