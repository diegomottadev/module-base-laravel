<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(10);
        return view('admin/security/users/index',compact('users'));
    }

    public function new(){
        $roles = $this->getRoles();
        return view('admin/security/users/new',compact('roles'));
    }

    public function show($id){
        $user  = User::findOrFail($id);
        return view('admin/security/users/show',compact('user'));
    }

    public function store(Request $request ){

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);
       
        $user->assignRole($request->get('roles')); 
        return redirect()->route('users.index')->with('toast_success', 'Usuario '.$user->name.' creada');
    }
    public function edit($id ){
        $roles = $this->getRoles();
        $user = User::with(['roles'])->findOrFail($id);
        return view('admin/security/users/edit',compact('user','roles'));
    }

    public function update(Request $request,$id ){

        $user  = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->syncRoles($request->get('roles')); 
        $user->save();
        return redirect()->route('users.index')->with('toast_success', 'Usuario '.$user->name.' modificada');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->noContent();
    }

    private function getRoles()
    {

        $tmp = Role::all();

        return $tmp;
    }
}
