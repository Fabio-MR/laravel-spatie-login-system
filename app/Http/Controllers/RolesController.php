<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // requer autenticação
    }


    //Exibe uma lista de funções.
    public function index()
    {

        $this->check_permission('view_roles');

        $roles = Role::all();
        return view('roles.index', compact('roles'));

    }


    //Exibe o formulário para criar uma nova função.
    public function create()
    {

        $this->check_permission('create_roles');

        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }


    //Armazena uma nova função.
    public function store(Request $request)
    {

        $this->check_permission('create_roles');

        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required'
        ], [
            'name.required' => 'O nome da função é obrigatório.',
            'guard_name.required' => 'O nome da guarda (guard_name) é obrigatório.'
        ]);


        $permissions = $request->permissions;
        $role = new Role;
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $role->save();

        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role Saved');

    }


    public function show(Role $role)
    {
        //
    }


    //Exibe o formulário para editar uma função existente.
    public function edit(Request $request, int $id)
    {

        $this->check_permission('edit_roles');

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));

    }


    //Atualiza uma função existente.
    public function update(Request $request, int $id)
    {

        $this->check_permission('edit_roles');

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role Updated');

    }

    public function destroy(Role $role)
    {
        //
    }
}