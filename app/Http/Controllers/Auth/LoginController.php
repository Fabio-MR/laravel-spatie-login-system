<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    public function index()
    {


        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Por favor, digite um e-mail.',
            'email.email' => 'Por favor, digite um e-mail válido.',
            'password.required' => 'Por favor, informe sua senha.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Login efetuado com sucesso!');
        }

        // Incrementar o contador de tentativas de login falhas
        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages([
            'email' => 'As credenciais de login fornecidas são inválidas.',
        ])->redirectTo(route('login'));
    }



    public function destroy()
    {
        Auth::logout();

        return redirect(route('login'));
    }



    // Função para incrementar as tentativas de login falhas
    protected function incrementLoginAttempts(Request $request)
    {
        $key = $this->throttleKey($request);

        cache()->add($key, 1, now()->addSeconds(60)); // Incrementar em 1 minuto
    }

    // Função para obter a chave de controle de tentativas de login falhas
    protected function throttleKey(Request $request)
    {
        return mb_strtolower($request->input('email')) . '|' . $request->ip();
    }
}