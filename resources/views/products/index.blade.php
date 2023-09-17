@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>

<div class="alert alert-info">
    <h4 class="alert-heading">Permissões de Produtos</h4>
    <ul class="list-group">
        <li class="list-group-item">
            @can('view_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode ver os Produtos
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode ver os Produtos
            @endcan
        </li>
        <li class="list-group-item">
            @can('create_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode criar Produtos
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode criar Produtos
            @endcan
        </li>
        <li class="list-group-item">
            @can('edit_categories')
                <i class="fas fa-check-circle text-success"></i> Você pode editar os Produtos
            @else
                <i class="fas fa-times-circle text-danger"></i> Você não pode editar os Produtos
            @endcan
        </li>
    </ul>
</div>
@endsection
