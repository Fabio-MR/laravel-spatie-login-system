@extends('layouts.app')



@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Criar permissão</h1>
</div>

<form method="POST" action="{{ route('permissions.store') }}">
   @csrf
   <div class="mb-3">
       <label for="name" class="form-label">Nome da Permissão</label>
       <input type="text" name="name" value="" class="form-control" placeholder="Nome da Permissão">
   </div>
   <div class="mb-3">
       <label for="description" class="form-label">Descrição</label>
       <textarea name="description" value="" class="form-control" placeholder="Descrição da Permissão"></textarea>
   </div>
   <div class="mb-3">
       <label for="guard_name" class="form-label">Nome do Guardião</label>
       <input type="text" name="guard_name" value="web" class="form-control">
   </div>
   <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection
