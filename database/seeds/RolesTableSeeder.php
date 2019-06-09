<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [];
        $permissions = Permission::orderBy('name', 'ASC')->get();

        foreach ($permissions as $permission) {
            $ids[] = $permission->id;
        }


        $role = new Role();
        $role->name = 'Super';
        $role->save();
        $role->permissions()->attach($ids);
    }
}
