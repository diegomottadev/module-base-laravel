<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $permissions = []; // an empty array of stored permission IDs
        // iterate though all routes
        foreach (Route::getRoutes()->getRoutes() as $key => $route) {
            // get route action
            $name = $route->getName();
  
            $action = $route->getActionname();
            // separating controller and method
             $_action = explode('@',$action);
             
             $controller = $_action[0];
             $method = end($_action);
            


            if ($name != null) {
                $permission_check = Permission::where(
                    ['name' => $name]
                )->first();
                if (!$permission_check) {
                    $permission = new Permission;
                    $permission->name = $name;
                    //$permission->guard_name = 'ROOT';
                    $permission->controller = $controller;
                    $permission->save();
                    // add stored permission id in array
                    $permissions[] = $permission;
                }
            }
        }

         $root_role = Role::where('name','ROOT')->first();
         $root_role->givePermissionTo($permissions); 

    }
}
