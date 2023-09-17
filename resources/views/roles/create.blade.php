@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar Função</h1>
</div>

<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <div class="mb-3">
        <label for="code" class="form-label">Nome da Função</label>
        <input type="text" name="name" value="" class="form-control" id="code" placeholder="Nome da Função">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Guarda</label>
        <input type="text" name="guard_name" value="web" class="form-control" id="name" placeholder="Nome da Guarda">
    </div>
    @include('inc.role_perms_form')
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection