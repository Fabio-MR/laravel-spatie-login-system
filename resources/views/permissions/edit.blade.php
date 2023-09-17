@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Editar permissão</h1>
</div>

<form method="POST" action="{{ route('permissions.update', $permission->id) }}">
   @csrf
   @method('PUT')

   <div class="mb-3">
       <label for="name" class="form-label">Nome da Permissão</label>
       <input type="text" name="name" value="{{ $permission->name }}" class="form-control" placeholder="Nome da Permissão">
   </div>

   <div class="mb-3">
       <label for="guard_name" class="form-label">Nome do Guardião</label>
       <input type="text" name="guard_name" value="{{ $permission->guard_name }}" class="form-control" placeholder="Nome do Guardião">
   </div>

   <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection