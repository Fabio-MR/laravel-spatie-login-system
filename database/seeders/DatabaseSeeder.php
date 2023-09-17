<?php

use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Propague o banco de dados do aplicativo.
	 *
	 * @return void
	 */
	public function run() {

		// Solicitar atualização de migração do banco de dados, padrão não
		if ($this->command->confirm('Você deseja atualizar (migrar: atualizar) o banco de dados antes de propagar?')) {
		
			// artisan migrate:refresh
			$this->command->call('migrate:refresh');
			$this->command->warn("Database reset. Seeding...");

		}

		$this->call([
			PermissionsTableSeeder::class,
			RolesTableSeeder::class,
			UsersTableSeeder::class
		]);

		$this->command->info('Agora você pode fazer login como superusuário com Login: super@email.com Senha: secreta');
    }
}