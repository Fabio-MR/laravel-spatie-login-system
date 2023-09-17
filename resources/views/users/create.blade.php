@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar Usuário</h1>
    </div>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Usuário</label>
            <input type="text" name="name" value="" class="form-control" placeholder="Nome do Usuário">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" name="email" value="" class="form-control" placeholder="E-mail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" value="" class="form-control" placeholder="Senha">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Repetir Senha</label>
            <input type="password" name="password1" value="" class="form-control" placeholder="Repetir Senha">
        </div>
        @include('inc.user_roles_form')
        <div class="p-3"></div>
        @include('inc.user_perms_form')
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </div>
    </form>
@endsection
