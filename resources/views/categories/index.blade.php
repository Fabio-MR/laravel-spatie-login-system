@extends('layouts.app')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Categorias</h1>
</div>

<div class="alert alert-info">
    <h4 class="alert-heading">Permissões de Categorias</h4>
    <ul class="list-group">
        <li class="list-group-item">
            @can('view_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode ver as categorias
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode ver as categorias
            @endcan
        </li>
        <li class="list-group-item">
            @can('create_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode criar categorias
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode criar categorias
            @endcan
        </li>
        <li class="list-group-item">
            @can('edit_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode editar as categorias
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode editar as categorias
            @endcan
        </li>
    </ul>
</div>
@endsection
