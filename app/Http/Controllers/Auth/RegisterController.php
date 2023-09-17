<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', 
        ], [
            'name.required' => 'Por favor, informe o seu nome.',
            'email.required' => 'Por favor, digite um e-mail.',
            'email.email' => 'Por favor, digite um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'password.required' => 'Por favor, informe sua senha.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'A senha e a confirmação de senha não coincidem.', 
        ]);
        

        // Crie um novo usuário e armazene os dados na DB
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // Use bcrypt para proteger a senha
        ]);

        // Redirecione o usuário após o registro bem-sucedido
        return redirect('/')->with('success', 'Registro concluído com sucesso!');
    }

}