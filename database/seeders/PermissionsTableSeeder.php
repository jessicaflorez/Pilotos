<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lista de permisos
		$permission = Permission::create(['name' => 'marcas_listar']);
		$permission = Permission::create(['name' => 'marcas_crear']);
		$permission = Permission::create(['name' => 'marcas_editar']);
		$permission = Permission::create(['name' => 'marcas_actualizar']);
		$permission = Permission::create(['name' => 'marcas_eliminar']);
		$permission = Permission::create(['name' => 'marcas_grafica']);

		$permission = Permission::create(['name' => 'modelos_listar']);
		$permission = Permission::create(['name' => 'modelos_crear']);
		$permission = Permission::create(['name' => 'modelos_editar']);
		$permission = Permission::create(['name' => 'modelos_actualizar']);
		$permission = Permission::create(['name' => 'modelos_eliminar']);

		$permission = Permission::create(['name' => 'usuarios_listar']);
		$permission = Permission::create(['name' => 'usuarios_crear']);
		$permission = Permission::create(['name' => 'usuarios_editar']);
		$permission = Permission::create(['name' => 'usuarios_actualizar']);
		$permission = Permission::create(['name' => 'usuarios_eliminar']);

		// Lista de roles
		$Administrador = Role::create(['name' => 'Administrador']);
		$Piloto = Role::create(['name' => 'Piloto']);

		// Se asigna los permisos al rol
		$Administrador->givePermissionTo([
			'usuarios_listar',
			'usuarios_crear',
			'usuarios_editar',
			'usuarios_actualizar',
			'usuarios_eliminar',
			'usuarios_eliminar',
			'marcas_listar',
			'modelos_listar',
		]);

		$Piloto->givePermissionTo([
			'marcas_listar',
			'marcas_crear',
			'marcas_editar',
			'marcas_actualizar',
			'marcas_eliminar',
			'marcas_grafica',
			'modelos_listar',
			'modelos_crear',
			'modelos_editar',
			'modelos_actualizar',
			'modelos_eliminar',
		]);

		// Asignamos roles a los usuarios
		$user = User::find(1);
		$user->assignRole('Administrador');

    }
}
