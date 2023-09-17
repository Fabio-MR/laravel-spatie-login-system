@extends('layouts.app')



@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar usuário</h1>
    </div>

    <form method='POST' action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome de Usuário</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                placeholder="Nome de Usuário">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Alterar Senha</label>
            <input type="password" name="password" value="" class="form-control" placeholder="Nova Senha">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Verificar Senha</label>
            <input type="password" name="password1" value="" class="form-control" placeholder="Repetir Senha">
        </div>
        <div class="p-3"></div>
        @include('inc.user_roles_form')
        <div class="p-3"></div>
        @include('inc.user_perms_form')
        <div class="p-3"></div>
        <button type="submit" class="btn btn-primary w-100">Salvar</button>
        <div class="p-3"></div>
    </form>


@stop

@section('js')
    <script>
        $('#roles').DataTable({
            "pageLength": 25,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        });

        $('#permissions').DataTable({
            "pageLength": 25,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        });
    </script>
@stop

@push('js')
