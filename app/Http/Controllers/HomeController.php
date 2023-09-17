<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();

        // Obtém todas as permissões associadas ao usuário
        $permissions = $user->permissions;
        $roleNames = $user->getRoleNames();

        if ($permissions->isEmpty() && $roleNames->isEmpty()) {
            // O usuário não tem permissões, exiba a mensagem personalizada
            return view('home.index')->with('message', 'Entre em contato com o administrador do sistema para obter permissões.');
        }
        
        // $permissions = Permission::all();
		// $roles = Role::all();
        return view('home.index');
    }
}