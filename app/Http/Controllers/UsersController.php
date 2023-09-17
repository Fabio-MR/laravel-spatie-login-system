<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth'); // Requer autenticação
	}


	//Exibir uma lista de recursos.
	public function index()
	{

		$this->check_permission('view_users'); // Verificar permissão

		$users = User::all();
		return view('users.index', compact('users'));

	}


	//Mostrar o formulário para criar um novo recurso.
	public function create()
	{

		$this->check_permission('create_users'); // Verificar permissão

		$permissions = Permission::all();
		$roles = Role::all();

		return view('users.create', compact('permissions', 'roles'));
	}


	//Armazenar um novo recurso recém-criado no armazenamento.
	public function store(Request $request)
	{

		$this->check_permission('create_users'); // Verificar permissão

		$this->validate($request, [
			'name' => 'bail|required|min:2',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6'
		]);

		$user = new User;
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		$user->save();

		// Lidar com as funções do usuário
		$this->syncPermissions($request, $user);

		return redirect()->route('users.index')->with(['success', 'Usuário Salvo']);

	}


	//Mostrar o recurso especificado.
	public function show(User $user)
	{
		//
	}


	//Mostrar o formulário para editar o recurso especificado.
	public function edit(Request $request, int $id)
	{

		$this->check_permission('edit_users'); // Verificar permissão

		$user = User::findOrFail($id);
		$permissions = Permission::all();
		$roles = Role::all();
		$user_roles = $user->getRoleNames();
		$user_permissions = $user->getDirectPermissions();

		return view(
			'users.edit',
			compact(
				'user',
				'roles',
				'permissions',
				'user_roles',
				'user_permissions'
			)
		);

	}


	//Atualizar o recurso especificado no armazenamento.
	public function update(Request $request, int $id)
	{

		$this->check_permission('edit_users'); // Verificar permissão

		$user = User::findOrFail($id);

		$user->name = $request->name;
		$user->email = $request->email;

		// Lidar com as funções do usuário
		$this->syncPermissions($request, $user);

		if ($request->get('password')) {
			$user->password = bcrypt($request->get('password'));
		}

		$user->save();

		return redirect()->route('users.index')->with('success', 'Usuário Atualizado');

	}


	//Remova o recurso especificado do armazenamento.
	public function destroy(int $id)
	{

		$this->check_permission('delete_users'); // Verificar permissão

		if (auth()->user()->id == $id) {
			return redirect()->route('users.index')->with('success', 'Usuário atual não pode ser excluído');

		}

		if (User::findOrFail($id)->delete()) {
			return redirect()->route('users.index')->with('success', 'Usuário Excluído');

		}
	}

	private function syncPermissions(Request $request, $user)
	{

		// Funções / permissões enviadas
		$roles = $request->get('roles', []);
		$permissions = $request->get('permissions', []);

		// Obter as funções
		$roles = Role::find($roles);

		// Verificar mudanças atuais nas funções
		if (!$user->hasAllRoles($roles)) {

			// Redefinir todas as permissões diretas do usuário
			// Bob - Eu tenho um problema potencial com isso - mas deixaremos assim por enquanto
			$user->permissions()->sync([]);

		} else {
			// Lidar com as permissões
			$user->syncPermissions($permissions);

		}

		$user->syncRoles($roles);

		return $user;
	}
}