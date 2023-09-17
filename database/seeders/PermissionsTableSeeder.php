<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

	/**
	 * Execute as sementes do banco de dados.
	 *
	 * @return void
	 */
	public function run()
	{

		$perms = [
			//  ['name' => 'create_roles',       'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'edit_roles',         'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'view_roles',         'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'delete_roles',       'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'create_permissions', 'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'edit_permissions',   'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'view_permissions',   'description' => '', 'guard_name' => 'web'],
			//  ['name' => 'delete_permissions', 'description' => '', 'guard_name' => 'web'],
			['name' => 'create_users', 'description' => '', 'guard_name' => 'web'],
			['name' => 'edit_users', 'description' => '', 'guard_name' => 'web'],
			['name' => 'view_users', 'description' => '', 'guard_name' => 'web'],
			['name' => 'delete_users', 'description' => '', 'guard_name' => 'web'],

			['name' => 'view_brands', 'description' => '', 'guard_name' => 'web'],
			['name' => 'create_brands', 'description' => '', 'guard_name' => 'web'],
			['name' => 'edit_brands', 'description' => '', 'guard_name' => 'web'],
			['name' => 'view_categories', 'description' => '', 'guard_name' => 'web'],
			['name' => 'create_categories', 'description' => '', 'guard_name' => 'web'],
			['name' => 'edit_categories', 'description' => '', 'guard_name' => 'web'],
			['name' => 'view_products', 'description' => '', 'guard_name' => 'web'],
			['name' => 'create_products', 'description' => '', 'guard_name' => 'web'],
			['name' => 'edit_products', 'description' => '', 'guard_name' => 'web'],


		];

		foreach ($perms as $perm) {
			$permission = new Permission();
			$permission->name = $perm['name'];
			//$permission->description = $perm['description'];
			$permission->guard_name = $perm['guard_name'];
			$permission->save();
		}

	}
}