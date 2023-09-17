<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{

	/**
	 * Execute as sementes do banco de dados.
	 * @return void
	 */
	public function run()
	{

		$roles = [
			['name' => 'Superuser', 'guard_name' => 'web'],
			['name' => 'Administrador', 'guard_name' => 'web'],
			['name' => 'Comum', 'guard_name' => 'web']
		];

		foreach ($roles as $r) {
			$role = new Role();
			$role->name = $r['name'];
			$role->guard_name = $r['guard_name'];
			$role->save();

			// anexe todas as permissões ao superusuário
			if ($role->name == 'Superuser') {
				$role->syncPermissions(Permission::all());
			} elseif ($role->name == 'Administrador') {

				// Para o Administrador, atribua todas as permissões relacionadas aos usuários
				$userPermissions = Permission::where('name', 'LIKE', '%_users')->get();
				$role->syncPermissions($userPermissions);
			}
			// visualizar permissões para todos os outros por padrão
			else {
				$commonPermissions = Permission::whereIn('name', [
					'view_brands',
					'create_brands',
					'edit_brands',
					'view_categories',
					'create_categories',
					'edit_categories',
					'view_products',
					'create_products',
					'edit_products',
				])->get();
				$role->syncPermissions($commonPermissions);
			}
		}
	}
}