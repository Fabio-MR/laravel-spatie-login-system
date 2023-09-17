<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder {

	/**
	 * Execute as sementes do banco de dados.
	 * @return void
	 */
	public function run() {

		$roles = [
			['name' => 'Superuser', 'guard_name' => 'web'],
			['name' => 'Admin',     'guard_name' => 'web'],
			['name' => 'User',      'guard_name' => 'web']
		];

		 foreach ($roles as $r) {
			 $role             = new Role();
			 $role->name       = $r['name'];
			 $role->guard_name = $r['guard_name'];
			 $role->save();

			// anexe todas as permissões ao superusuário
			if ($role->name == 'Superuser') {
		 		$role->syncPermissions(Permission::all());

			// visualizar permissões para todos os outros por padrão
			} else {
				$role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());

			}
		}
	}
}