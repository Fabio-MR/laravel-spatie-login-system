@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Marcas</h1>
    </div>


    <div class="alert alert-info">
        <h4 class="alert-heading">Permissões de Marca</h4>
        <ul class="list-group">
            <li class="list-group-item">
                @can('view_brands')
                    <i class="fas fa-check-circle text-success"></i> Você pode ver as marcas
                @else
                    <i class="fas fa-times-circle text-danger"></i> Você não pode ver as marcas
                @endcan
            </li>
            <li class="list-group-item">
                @can('create_brands')
                    <i class="fas fa-check-circle text-success"></i> Você pode criar marcas
                @else
                    <i class="fas fa-times-circle text-danger"></i> Você não pode criar marcas
                @endcan
            </li>
            <li class="list-group-item">
                @can('edit_brands')
                    <i class="fas fa-check-circle text-success"></i> Você pode editar as marcas
                @else
                    <i class="fas fa-times-circle text-danger"></i> Você não pode editar as marcas
                @endcan
            </li>
        </ul>
    </div>
    
@endsection
