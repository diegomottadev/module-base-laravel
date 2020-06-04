<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Route;


class PermissionController extends Controller
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

    public function index($id){
        $controllers = $this->getControllers();
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        if($role->permissions != null){
            $hasPermissions = $role->permissions;
        }
        return view('admin/security/permissions/index', compact('permissions','hasPermissions','role','controllers'));
    }

    public function update(Request $request, $id){
        $role = Role::findOrFail($id);
        $permissions = $request->get('permissions');
        $role->givePermissionTo($permissions);  
        return redirect()->route('roles.index')->with('toast_success', 'Permisos agregados al rol '.$role->name);
    }

    private function  getControllers(){
        $controllers = [];

        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();

            if (array_key_exists('controller', $action))
            {
                $action = explode('@',$action['controller']);

                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $controllers[] = $action[0];
            }
        }

        $controllers =  array_diff($controllers, [
            "Facade\Ignition\Http\Controllers\HealthCheckController"	,
            "Facade\Ignition\Http\Controllers\ExecuteSolutionController"	,
            "Facade\Ignition\Http\Controllers\ShareReportController"	,
            "Facade\Ignition\Http\Controllers\ScriptController"	,
            "Facade\Ignition\Http\Controllers\StyleController",	
            "App\Http\Controllers\FrontEnd\PublicsControllers\HomeController",
            "App\Http\Controllers\BackEnd\AdminControllers\HomeController"
        ]);
        return   array_unique($controllers);
    }
}