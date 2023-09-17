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

		// Verificar permissão de visualização de usuários
		$this->check_permission('view_users');

		$user = auth()->user(); // Obtém o usuário autenticado

		if ($user->hasRole('Superuser')) { // Verifica se o usuário tem a função 'Superuser'
			$users = User::all(); // Lista todos os usuários se for 'Superuser'
		} else {
			$users = User::where(function ($query) use ($user) {
				// A partir daqui, você está filtrando os usuários com base nas condições especificadas

				// 1. Exclua os usuários que têm a função 'Superuser'
				$query->whereDoesntHave('roles', function ($roleQuery) {
					$roleQuery->where('name', 'Superuser');
				})

					// 2. E, em seguida, verifique duas condições:
					->where(function ($innerQuery) use ($user) {
						// a. Usuários sem função
						$innerQuery->whereDoesntHave('roles')
							// b. Ou usuários que não têm a mesma função que o usuário autenticado
							->orWhereDoesntHave('roles', function ($roleQuery) use ($user) {
							$roleQuery->where('name', $user->roles->first()->name);
						});
					});
			})->get(); // Obtenha os usuários que atendem a essas condições
		}



		// Agora, $users conterá os usuários filtrados com base nas permissões

		return view('users.index', compact('users'));

	}


	//Mostrar o formulário para criar um novo recurso.
	public function create()
	{
		$user = auth()->user(); // Obtém o usuário autenticado

		// Inicializa as variáveis com todos os valores
		$permissions = Permission::all();
		$roles = Role::all();

		if (!$user->hasRole('Superuser')) {
			$roles = $roles->filter(function ($role) use ($user) {
				// Mantenha apenas as funções que não são 'Superuser' ou são diferentes da função do usuário autenticado
				return $role->name !== 'Superuser' && $role->name !== $user->roles->first()->name;
			});
		}

		return view('users.create', compact('permissions', 'roles'));
	}

	//Armazenar um novo usuario atraves do painel de adiministrador
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



		if (!$user->hasRole('Superuser')) {
			$roles = $roles->filter(function ($role) use ($user) {
				// Mantenha apenas as funções que não são 'Superuser' ou são diferentes da função do usuário autenticado
				return $role->name !== 'Superuser' && $role->name !== 'Administrador';
			});
		}

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