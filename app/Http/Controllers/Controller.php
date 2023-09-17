<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, ValidatesRequests;

	/**
	 * Verifica se o usuário tem permissão para realizar uma ação.
	 *
	 * @param string $perm Permissão que está sendo verificada.
	 * @return bool|int Retorna verdadeiro se o usuário tiver permissão, caso contrário, aborta com um erro 403.
	 */
	protected function check_permission($perm = '')
	{
		if (!auth()->user()->can($perm)) {
			throw new AuthorizationException($perm . ' Unauthorized');
		}

		return true;
	}
}