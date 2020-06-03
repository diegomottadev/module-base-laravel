<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $roles = Role::paginate(10);
        return view('admin/security/roles/index', compact('roles'));

    }

    public function new(){
        return view('admin/security/roles/new');

    }

    public function store(Request $request){
        $role = Role::create(['name' => $request->get('name')]);
        return redirect()->route('roles.index')->with('toast_success', 'Rol '.$role->name.' creado');
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('admin/security/roles/edit',compact('role'));
    }

    public function show($id){
        
    }

    public function update($id,Request $request){
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->save();
        return redirect()->route('roles.index')->with('toast_success', 'Rol '.$role->name.' modificado');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->noContent();

    }

}
