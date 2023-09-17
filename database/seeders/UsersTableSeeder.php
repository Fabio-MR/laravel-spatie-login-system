<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['name' => 'Super User', 'email' => 'super@email.com', 'password' => 'secret', 'role' => 'Superuser'],
            ['name' => 'Admin User', 'email' => 'admin@email.com', 'password' => 'secret', 'role' => 'Admin'],
            ['name' => 'User User', 'email' => 'user@email.com', 'password' => 'secret', 'role' => 'User']
        ];

        foreach ($users as $usr) {

            $user = new User();
            $user->name = $usr['name'];
            $user->email = $usr['email'];
            $user->password = bcrypt($usr['password']);
            $user->save();

            $user->assignRole($usr['role']);
        }

    }
}