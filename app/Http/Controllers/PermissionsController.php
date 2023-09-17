<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // requer autenticação
    }


    // Exibe uma lista de permissões.
    public function index()
    {

        $this->check_permission('view_permissions');
        $permissions = Permission::all();

        return view('permissions.index', compact('permissions'));

    }


    //Exibe o formulário para criar uma nova permissão.
    public function create()
    {

        $this->check_permission('create_permissions');

        return view('permissions.create');
    }


    //Armazena uma nova permissão.
    public function store(Request $request)
    {

        $this->check_permission('create_permissions');

        $this->validate($request, [
            'name' => 'required|unique:permissions',
            'guard_name' => 'required'
        ], [
            'name.required' => 'O nome da permissão é obrigatório.',
            'name.unique' => 'Essa permissão já existe.',
            'guard_name.required' => 'A nome da guarda (guard_name) é obrigatória.'
        ]);

        $permission = new Permission;
        $permission->name = $request->input('name');
        //$permission->description = $request->input('description');
        $permission->guard_name = $request->input('guard_name');
        $permission->save();

        return redirect()->route('permissions.index')->with(['success', 'Permission Saved']);

    }

    public function show(Permission $permission)
    {
        //
    }


    //Exibe o formulário para editar uma permissão existente.
    public function edit(Request $request, int $id)
    {

        $this->check_permission('edit_permissions');

        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));

    }


    //Atualiza uma permissão existente.
    public function update(Request $request, int $id)
    {

        $this->check_permission('edit_permissions');

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission Updated');

    }



    public function destroy(Permission $permission)
    {
        //
    }

} // class