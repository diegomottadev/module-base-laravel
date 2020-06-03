<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'ROOT']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Premium']);
        Role::create(['name' => 'Normal']);
        Role::create(['name' => 'Comisionista']);


        /** @var \App\User $user */
        $root = factory(\App\User::class)->create([
            'name' => 'root',
            'email' => 'root@root.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        $root->assignRole('root');

    }
}
