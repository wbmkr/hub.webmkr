<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Criar permissão', 'Editar permissão', 'Deletar permissão', 'Criar cargo', 'Editar cargo', 'Deletar cargo', 'Criar administrador', 'Editar administrador', 'Deletar administrador'
        ];

        foreach ($permissions as $value) {
            $permission = new Permission();
            $permission->name = $value;
            $permission->save();
        }
    }
}
