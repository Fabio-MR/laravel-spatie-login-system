@extends('layouts.app')
@section('title', 'roles')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar funções</h1>
</div>

@can('create_roles')
    <div style="float:right;padding-right:20px;"><a href="{{ route('roles.create') }}" title="Adicionar Nova Função"><i
                class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
@endcan

<div class="card-body">
    @if (count($roles))
        <table id="roles" class="table table-striped table-hover table-responsive-sm table-sm compact">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nome da Guarda</th>
                    <th>Criado</th>
                    <th>Atualizado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->toFormattedDateString() }}</td>
                        <td>{{ $role->updated_at->toFormattedDateString() }}</td>
                        <td>
                            @can('edit_roles')
                                <a href="{{ route('roles.edit', ['role' => $role->id]) }}" title="Editar Detalhes da Função"><i
                                        class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nome da Guarda</th>
                    <th>Criado</th>
                    <th>Atualizado</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    @else
        <center>Nenhum Registro Encontrado...</center>
    @endif
</div>

@stop

@section('css')
@stop

@section('js')
    <script>
        $('#roles').DataTable({
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

@push('css')
    @push('js')
