@extends('layouts.app')
@section('title', 'users')



	@section('content')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Usuários</h1>
	</div>
	
	@can('create_users')
	<div style="float: right; padding-right: 20px;">
		<a href="{{ route('users.create') }}" title="Adicionar Novo Usuário">
			<i class="fa fa-plus-circle fa-2x"></i>
		</a>
	</div>
	@endcan
	
	<div class="card-body">
		@if (count($users))
		<table id="users" class="table table-striped table-striped table-sm table-hover table-responsive-sm table-sm compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Criado</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->toFormattedDateString() }}</td>
					<td>
						@can('view_users')
						<!--
						{{-- <a href="{{ route('users.show', ['user' => $user->id]) }}" title="Ver Detalhes do Usuário">
							<i class="fa fa-info-circle fa-2x"></i>
						</a>&nbsp;&nbsp; --}}
						-->
						@endcan
	
						@can('edit_users')
						<a href="{{ route('users.edit', ['user' => $user->id]) }}" title="Editar Detalhes do Usuário">
							<i class="fa fa-pencil-square fa-2x"></i>
						</a>
						@endcan
	
						@can('delete_users')
						<form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}" style="display:inline;">
							@csrf
							@method('DELETE')
							<a onclick="if(confirm('Realmente deseja excluir este usuário?')) { this.parentNode.submit(); }"
								title="Excluir este Usuário">
								<i class="fa fa-trash fa-2x" style="color: red;"></i>
							</a>
						</form>
						@endcan
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Criado</th>
					<th>Ações</th>
				</tr>
			</tfoot>
		</table>
		@else
		<center>Nenhum registro encontrado...</center>
		@endif
	</div>
	
		
		@stop

		@section('css')
		@stop

		@section('js')
		<script>
		$('#users').DataTable({
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

@push('css')
@push('js')