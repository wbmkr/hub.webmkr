<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Permission;
use App\Role;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        $role = Role::where('slug', 'super')->first();

        $ids = [];
        foreach ($permissions as $permission) {
            $ids[] = $permission->id;
        }

        $admin = new Admin();
        $admin->name = 'Webmkr';
        $admin->email = 'admin@webmkr.com.br';
        $admin->password = bcrypt('@webmkr2103');
        $admin->active = true;
        $admin->save();
        $admin->roles()->attach($role->id);
        $admin->permissions()->attach($ids);
    }
}
