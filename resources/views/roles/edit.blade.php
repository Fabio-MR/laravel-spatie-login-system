@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Funções</h1>
</div>

<form method="POST" action="{{ route('roles.update', $role->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome da Função</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Nome da Função">
    </div>
    <div class="mb-3">
        <label for="guard_name" class="form-label">Nome do Guardião</label>
        <input type="text" name="guard_name" value="{{ $role->guard_name }}" class="form-control" placeholder="Nome do Guardião">
    </div>
	<div class="p-3"></div>
    @include('inc.role_perms_form')
	<div class="p-3"></div>
    <button type="submit" class="btn btn-primary w-100">Enviar</button>
	<div class="p-3"></div>
</form>
@stop

@section('js')
<script>
$('#permissions').DataTable({
  "pageLength": 25,
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  'columnDefs' : [{
    'targets' : [-1],
    'orderable' : false
   }]
});
</script>
@stop

@push('js')